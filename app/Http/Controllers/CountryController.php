<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\CountryRequest;
use Controlqtime\Core\Contracts\CountryRepoInterface;

class CountryController extends Controller
{
	/**
	 * @var CountryRepoInterface
	 */
	protected $country;
	
	/**
	 * CountryController constructor.
	 *
	 * @param CountryRepoInterface $country
	 */
	public function __construct(CountryRepoInterface $country)
	{
		$this->country = $country;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.countries.index');
	}
	
	/**
	 * @return mixed for Bootstrap-table
	 */
	public function getCountries()
	{
		$countries = $this->country->all();
		
		return $countries;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.countries.create');
	}
	
	/**
	 * @param CountryRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(CountryRequest $request)
	{
		$this->country->create($request->all());
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/countries'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$country = $this->country->find($id);
		
		return view('maintainers.countries.edit', compact('country'));
	}
	
	/**
	 * @param CountryRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(CountryRequest $request, $id)
	{
		$this->country->update($request->all(), $id);
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/countries'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->country->delete($id);
		
		return redirect()->route('countries.index');
	}
}
