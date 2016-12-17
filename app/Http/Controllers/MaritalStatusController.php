<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\MaritalStatus;
use Controlqtime\Http\Requests\MaritalStatusRequest;

class MaritalStatusController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var MaritalStatus
	 */
	protected $maritalStatus;
	
	/**
	 * MaritalStatusController constructor.
	 *
	 * @param Log           $log
	 * @param MaritalStatus $maritalStatus
	 */
	public function __construct(Log $log, MaritalStatus $maritalStatus)
	{
		$this->log           = $log;
		$this->maritalStatus = $maritalStatus;
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getMaritalStatuses()
	{
		$maritalStatus = $this->maritalStatus->all();
		
		return $maritalStatus;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.marital-statuses.index');
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.marital-statuses.create');
	}
	
	/**
	 * @param MaritalStatusRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(MaritalStatusRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->maritalStatus->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/marital-statuses']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store MaritalStatus: " . $e->getMessage());
			
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
			$maritalStatus = $this->maritalStatus->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $maritalStatus->restore();
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
		$maritalStatus = $this->maritalStatus->findOrFail($id);
		
		return view('maintainers.marital-statuses.edit', compact('maritalStatus'));
	}
	
	/**
	 * @param MaritalStatusRequest $request
	 * @param                      $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(MaritalStatusRequest $request, $id)
	{
		try
		{
			$this->maritalStatus->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/marital-statuses']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update MaritalStatus: " . $e->getMessage());
			
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
		$this->maritalStatus->destroy($id);
		
		return redirect()->route('marital-statuses.index');
	}
}
