<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\City;
use Controlqtime\Core\Entities\Country;
use Controlqtime\Http\Requests\CityRequest;

class CityController extends Controller
{
	/**
	 * @var City
	 */
	protected $city;
	
	/**
	 * @var Country
	 */
	protected $country;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * CityController constructor.
	 *
	 * @param City    $city
	 * @param Country $country
	 * @param Log     $log
	 */
	public function __construct(City $city, Country $country, Log $log)
	{
		$this->city    = $city;
		$this->country = $country;
		$this->log     = $log;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.cities.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getCities()
	{
		$cities = $this->city->with(['country'])->get();
		
		return $cities;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$countries = $this->country->pluck('name', 'id');
		
		return view('maintainers.cities.create', compact('countries'));
	}
	
	/**
	 * @param CityRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(CityRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->city->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/cities']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store City: " . $e->getMessage());
			
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
			$area = $this->city->onlyTrashed()->where('name', $request->get('name'))->where('country_id', $request->get('country_id'))->firstOrFail();
			
			return $area->restore();
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
		$city      = $this->city->findOrFail($id);
		$countries = $this->country->pluck('name', 'id');
		
		return view('maintainers.cities.edit', compact('city', 'countries'));
	}
	
	
	public function update(CityRequest $request, $id)
	{
		try
		{
			$this->city->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/cities']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update City: " . $e->getMessage());
			
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
			$this->city->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('cities.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete City: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
