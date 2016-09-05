<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\CityRepoInterface;
use Controlqtime\Core\Contracts\CountryRepoInterface;
use Controlqtime\Core\Entities\City;
use Controlqtime\Core\Entities\Country;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\CityRequest;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    protected $city;

    protected $country;

    public function __construct(CityRepoInterface $city, CountryRepoInterface $country)
    {
        $this->city = $city;
        $this->country = $country;
    }
    
    public function index()
    {
        return view('maintainers.cities.index');
    }

    public function getCities() {
        $cities = $this->city->all(['country']);
        return $cities;
    }

    public function create()
    {
        $countries = $this->country->lists('name', 'id');
        return view('maintainers.cities.create', compact('countries'));
    }

    public function store(CityRequest $request)
    {
        $this->city->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/cities'
		));
    }

    public function edit($id)
    {
        $city      = $this->city->find($id);
        $countries = $this->country->lists('name', 'id');
        return view('maintainers.cities.edit', compact('city', 'countries'));
    }

    public function update(CityRequest $request, $id)
    {
        $this->city->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/cities'
		));
    }

    public function destroy($id)
    {
        $this->city->delete($id);
        return redirect()->route('maintainers.cities.index');
    }
}
