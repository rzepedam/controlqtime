<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Mutuality;
use Controlqtime\Http\Requests\MutualityRequest;

class MutualityController extends Controller
{
	/**
	 * @var Mutuality
	 */
	protected $mutuality;
	
	/**
	 * MutualityController constructor.
	 *
	 * @param Mutuality $mutuality
	 */
	public function __construct(Mutuality $mutuality)
	{
		$this->mutuality = $mutuality;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.mutualities.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getMutualities()
	{
		$mutualities = $this->mutuality->all();
		
		return $mutualities;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.mutualities.create');
	}
	
	/**
	 * @param MutualityRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(MutualityRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->mutuality->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/mutualities'
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
			$mutuality = $this->mutuality->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $mutuality->restore();
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
		$mutuality = $this->mutuality->findOrFail($id);
		
		return view('maintainers.mutualities.edit', compact('mutuality'));
	}
	
	/**
	 * @param MutualityRequest $request
	 * @param                  $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(MutualityRequest $request, $id)
	{
		try
		{
			$this->mutuality->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/mutualities'
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
		$this->mutuality->destroy($id);
		
		return redirect()->route('mutualities.index');
	}
}
