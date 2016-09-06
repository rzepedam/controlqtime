<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\CountryRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\CountryRequest;

class CountryController extends Controller
{
	/**
	 * @var CountryRepoInterface
	 */
	protected $country;

	/**
	 * CountryController constructor.
	 * @param CountryRepoInterface $country
	 */
	public function __construct(CountryRepoInterface $country)
    {
        $this->country = $country;
    }

    public function index()
    {
        return view('maintainers.countries.index');
    }

	/**
	 * return countries fot Bootstrap-table
	 * @return mixed
	 */
	public function getCountries()
    {
        $countries = $this->country->all();
        return $countries;
    }

    public function create()
    {
        return view('maintainers.countries.create');
    }

    public function store(CountryRequest $request)
    {
        $this->country->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/countries'
		));
    }

    public function edit($id)
    {
        $country = $this->country->find($id);
        return view('maintainers.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, $id)
    {
        $this->country->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/countries'
		));
    }

    public function destroy($id)
    {
        $this->country->delete($id);
        return redirect()->route('countries.index');
    }
}
