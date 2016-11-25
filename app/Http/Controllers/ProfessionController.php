<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\ProfessionRequest;
use Controlqtime\Core\Contracts\ProfessionRepoInterface;

class ProfessionController extends Controller
{
	/**
	 * @var ProfessionRepoInterface
	 */
	protected $profession;
	
	/**
	 * ProfessionController constructor.
	 *
	 * @param ProfessionRepoInterface $profession
	 */
	public function __construct(ProfessionRepoInterface $profession)
	{
		$this->profession = $profession;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.professions.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getProfessions()
	{
		$professions = $this->profession->all();
		
		return $professions;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.professions.create');
	}
	
	/**
	 * @param ProfessionRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(ProfessionRequest $request)
	{
		$profession = $this->profession->onlyTrashed('name', $request->get('name'));
		
		if ( ! $profession )
		{
			$this->profession->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/professions'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$profession = $this->profession->find($id);
		
		return view('maintainers.professions.edit', compact('profession'));
	}
	
	/**
	 * @param ProfessionRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(ProfessionRequest $request, $id)
	{
		$this->profession->update($request->all(), $id);
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/professions'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->profession->delete($id);
		
		return redirect()->route('professions.index');
	}
}
