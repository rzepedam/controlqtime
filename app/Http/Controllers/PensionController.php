<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Pension;
use Controlqtime\Http\Requests\PensionRequest;

class PensionController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var Pension
	 */
	protected $pension;
	
	/**
	 * PensionController constructor.
	 *
	 * @param Log     $log
	 * @param Pension $pension
	 */
	public function __construct(Log $log, Pension $pension)
	{
		$this->log     = $log;
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
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->pension->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/pensions']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Pension: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
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
			
			return response()->json(['status' => true, 'url' => '/maintainers/pensions']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update Pension: " . $e->getMessage());
			
			return response()->json(['status' => false]);
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
