<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\CityRequest;
use Controlqtime\Core\Contracts\CityRepoInterface;
use Controlqtime\Core\Contracts\CountryRepoInterface;

class CityController extends Controller
{
	/**
	 * @var CityRepoInterface
	 */
	protected $city;
	
	/**
	 * @var CountryRepoInterface
	 */
	protected $country;
	
	/**
	 * CityController constructor.
	 *
	 * @param CityRepoInterface $city
	 * @param CountryRepoInterface $country
	 */
	public function __construct(CityRepoInterface $city, CountryRepoInterface $country)
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
		$cities = $this->city->all(['country']);
		
		return $cities;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$countries = $this->country->lists('name', 'id');
		
		return view('maintainers.cities.create', compact('countries'));
	}
	
	/**
	 * @param CityRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(CityRequest $request)
	{
		$city = $this->city->onlyTrashedComposed('name', 'country_id', $request->get('name'), $request->get('country_id'));
		
		if ( ! $city )
		{
			$this->city->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/cities'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$city      = $this->city->find($id);
		$countries = $this->country->lists('name', 'id');
		
		return view('maintainers.cities.edit', compact('city', 'countries'));
	}
	
	/**
	 * @param CityRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(CityRequest $request, $id)
	{
		$this->city->update($request->all(), $id);
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/cities'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->city->delete($id);
		
		return redirect()->route('cities.index');
	}
}
