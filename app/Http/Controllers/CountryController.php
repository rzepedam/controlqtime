<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Country;
use Controlqtime\Http\Requests\CountryRequest;

class CountryController extends Controller
{
	/**
	 * @var Country
	 */
	protected $country;
	
	/**
	 * CountryController constructor.
	 *
	 * @param Country $country
	 */
	public function __construct(Country $country)
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
		if ( ! $this->restore($request) )
		{
			$this->country->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/countries'
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
			$country = $this->country->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $country->restore();
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
		$country = $this->country->findOrFail($id);
		
		return view('maintainers.countries.edit', compact('country'));
	}
	
	/**
	 * @param CountryRequest $request
	 * @param                $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(CountryRequest $request, $id)
	{
		try
		{
			$this->country->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/countries'
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
		$this->country->destroy($id);
		
		return redirect()->route('countries.index');
	}
}
