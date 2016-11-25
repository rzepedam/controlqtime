<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\RelationshipRequest;
use Controlqtime\Core\Contracts\RelationshipRepoInterface;

class RelationshipController extends Controller
{
	/**
	 * @var RelationshipRepoInterface
	 */
	protected $relationship;
	
	/**
	 * RelationshipController constructor.
	 *
	 * @param RelationshipRepoInterface $relationship
	 */
	public function __construct(RelationshipRepoInterface $relationship)
	{
		$this->relationship = $relationship;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.relationships.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getRelationships()
	{
		$relationships = $this->relationship->all();
		
		return $relationships;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.relationships.create');
	}
	
	/**
	 * @param RelationshipRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(RelationshipRequest $request)
	{
		$relationship = $this->relationship->onlyTrashed('name', $request->get('name'));
		
		if ( ! $relationship )
		{
			$this->relationship->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/relationships'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$relationship = $this->relationship->find($id);
		
		return view('maintainers.relationships.edit', compact('relationship'));
	}
	
	/**
	 * @param RelationshipRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(RelationshipRequest $request, $id)
	{
		$this->relationship->update($request->all(), $id);
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/relationships'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->relationship->delete($id);
		
		return redirect()->route('relationships.index');
	}
}
