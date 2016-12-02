<?php

namespace Controlqtime\Http\Controllers;

use Exception;
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
	 * CityController constructor.
	 *
	 * @param City    $city
	 * @param Country $country
	 */
	public function __construct(City $city, Country $country)
	{
		$this->city    = $city;
		$this->country = $country;
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
		if ( ! $this->restore($request) )
		{
			$this->city->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/cities'
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
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/cities'
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
		$this->city->destroy($id);
		
		return redirect()->route('cities.index');
	}
}
