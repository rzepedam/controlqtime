<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Http\Requests\ForecastRequest;

class ForecastController extends Controller
{
	/**
	 * @var Forecast
	 */
	protected $forecast;
	
	/**
	 * ForecastController constructor.
	 *
	 * @param Forecast $forecast
	 */
	public function __construct(Forecast $forecast)
	{
		$this->forecast = $forecast;
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
		if ( ! $this->restore($request) )
		{
			$this->forecast->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/forecasts'
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
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/forecasts'
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
		$this->forecast->destroy($id);
		
		return redirect()->route('forecasts.index');
	}
	
}
