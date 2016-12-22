<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\DayTrip;
use Controlqtime\Http\Requests\DayTripRequest;

class DayTripController extends Controller
{
	/**
	 * @var DayTrip
	 */
	protected $dayTrip;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * DayTripController constructor.
	 *
	 * @param DayTrip $dayTrip
	 * @param Log     $log
	 */
	public function __construct(DayTrip $dayTrip, Log $log)
	{
		$this->dayTrip = $dayTrip;
		$this->log     = $log;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.day-trips.index');
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getDayTrips()
	{
		$dayTrips = $this->dayTrip->all();
		
		return $dayTrips;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.day-trips.create');
	}
	
	/**
	 * @param DayTripRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(DayTripRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->dayTrip->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/day-trips']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store DayTrip: " . $e->getMessage());
			
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
			$dayTrip = $this->dayTrip->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $dayTrip->restore();
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
		$dayTrip = $this->dayTrip->findOrFail($id);
		
		return view('maintainers.day-trips.edit', compact('dayTrip'));
	}
	
	/**
	 * @param \Controlqtime\Http\Requests\DayTripRequest $request
	 * @param                                            $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(DayTripRequest $request, $id)
	{
		try
		{
			$this->dayTrip->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/day-trips']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update DayTrip: " . $e->getMessage());
			
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
		try
		{
			$this->dayTrip->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('day-trips.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete DayTrip: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
