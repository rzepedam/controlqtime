<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Http\Requests\RelationshipRequest;

class RelationshipController extends Controller
{
	/**
	 * @var Relationship
	 */
	protected $relationship;
	
	/**
	 * RelationshipController constructor.
	 *
	 * @param Relationship $relationship
	 */
	public function __construct(Relationship $relationship)
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
		if ( ! $this->restore($request) )
		{
			$this->relationship->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/relationships'
		]);
	}
	
	/**
	 * @param $request
	 *
	 * @return bool
	 */
	public function restore($request)
	{
		try
		{
			$relationship = $this->relationship->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $relationship->restore();
		} catch ( Exception $e )
		{
			return false;
		}
		
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$relationship = $this->relationship->findOrFail($id);
		
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
		try
		{
			$this->relationship->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/relationships'
			]);
		} catch ( Exception $e )
		{
			return response()->json(['success' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->relationship->destroy($id);
		
		return redirect()->route('relationships.index');
	}
}
