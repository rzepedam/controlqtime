<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Periodicity;
use Controlqtime\Http\Requests\PeriodicityRequest;

class PeriodicityController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var Periodicity
	 */
	protected $periodiocity;
	
	/**
	 * PeriodicityController constructor.
	 *
	 * @param Log         $log
	 * @param Periodicity $periodiocity
	 */
	public function __construct(Log $log, Periodicity $periodiocity)
	{
		$this->log          = $log;
		$this->periodiocity = $periodiocity;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.periodicities.index');
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getPeriodicities()
	{
		$periodicities = $this->periodiocity->all();
		
		return $periodicities;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.periodicities.create');
	}
	
	/**
	 * @param PeriodicityRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(PeriodicityRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->periodiocity->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/periodicities']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Periodicity: " . $e->getMessage());
			
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
			$periodicity = $this->periodiocity->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $periodicity->restore();
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
		$periodicity = $this->periodiocity->findOrFail($id);
		
		return view('maintainers.periodicities.edit', compact('periodicity'));
	}
	
	/**
	 * @param PeriodicityRequest $request
	 * @param                    $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(PeriodicityRequest $request, $id)
	{
		try
		{
			$this->periodiocity->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/periodicities']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update Periodicity: " . $e->getMessage());
			
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
		$this->periodiocity->destroy($id);
		
		return redirect()->route('periodicities.index');
	}
}
