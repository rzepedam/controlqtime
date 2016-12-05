<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Pension;
use Controlqtime\Http\Requests\PensionRequest;

class PensionController extends Controller
{
	/**
	 * @var Pension
	 */
	protected $pension;
	
	/**
	 * PensionController constructor.
	 *
	 * @param Pension $pension
	 */
	public function __construct(Pension $pension)
	{
		$this->pension = $pension;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.pensions.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getPensions()
	{
		$pensions = $this->pension->all();
		
		return $pensions;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.pensions.create');
	}
	
	/**
	 * @param PensionRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(PensionRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->pension->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/pensions'
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
			$pension = $this->pension->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $pension->restore();
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
		$pension = $this->pension->findOrFail($id);
		
		return view('maintainers.pensions.edit', compact('pension'));
	}
	
	/**
	 * @param PensionRequest $request
	 * @param                $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(PensionRequest $request, $id)
	{
		try
		{
			$this->pension->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/pensions'
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
		$this->pension->destroy($id);
		
		return redirect()->route('pensions.index');
	}
}
