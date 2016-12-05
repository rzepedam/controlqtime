<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Profession;
use Controlqtime\Http\Requests\ProfessionRequest;

class ProfessionController extends Controller
{
	/**
	 * @var Profession
	 */
	protected $profession;
	
	/**
	 * ProfessionController constructor.
	 *
	 * @param Profession $profession
	 */
	public function __construct(Profession $profession)
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
		if ( ! $this->restore($request) )
		{
			$this->profession->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/professions'
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
			$profession = $this->profession->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $profession->restore();
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
		$profession = $this->profession->findOrFail($id);
		
		return view('maintainers.professions.edit', compact('profession'));
	}
	
	/**
	 * @param ProfessionRequest $request
	 * @param                   $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(ProfessionRequest $request, $id)
	{
		try
		{
			$this->profession->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/professions'
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
		$this->profession->destroy($id);
		
		return redirect()->route('professions.index');
	}
}
