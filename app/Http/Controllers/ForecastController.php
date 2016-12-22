<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Http\Requests\ForecastRequest;

class ForecastController extends Controller
{
	/**
	 * @var Forecast
	 */
	protected $forecast;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * ForecastController constructor.
	 *
	 * @param Forecast $forecast
	 * @param Log      $log
	 */
	public function __construct(Forecast $forecast, Log $log)
	{
		$this->forecast = $forecast;
		$this->log      = $log;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.forecasts.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getForecasts()
	{
		$forecasts = $this->forecast->all();
		
		return $forecasts;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.forecasts.create');
	}
	
	/**
	 * @param ForecastRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(ForecastRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->forecast->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/forecasts']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Forecast: " . $e->getMessage());
			
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
			$forecast = $this->forecast->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $forecast->restore();
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
		$forecast = $this->forecast->findOrFail($id);
		
		return view('maintainers.forecasts.edit', compact('forecast'));
	}
	
	/**
	 * @param ForecastRequest $request
	 * @param                 $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(ForecastRequest $request, $id)
	{
		try
		{
			$this->forecast->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/forecasts']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update Forecast: " . $e->getMessage());
			
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
			$this->forecast->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('forecasts.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete Forecast: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
}
