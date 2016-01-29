<?php

namespace App\Http\Controllers;

use App\Disability;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Manpower;
use App\Gender;
use App\Rating;
use App\Commune;
use App\Country;
use App\Forecast;

class ManpowerController extends Controller
{
    public function index(Request $request)
    {
        $manpowers = Manpower::name($request->get('table_search'))->orderBy('full_name')->paginate(25);
        return view('human-resources.manpowers.index', compact('manpowers'));
    }

    public function create()
    {
        $genders = Gender::lists('name', 'id');
        $forecasts = Forecast::lists('name', 'id');
        $countries = Country::lists('name', 'id');
        $ratings = Rating::lists('name', 'id');
        $communes = Commune::lists('name', 'id');
        $disabilities = Disability::lists('name', 'id');

        return view('human-resources.manpowers.create', compact(
            'genders', 'ratings', 'communes', 'countries', 'forecasts', 'disabilities'
        ));
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $manpower = Manpower::findOrFail($id);
        return view('human-resources.manpowers.show', compact('manpower'));
    }
}
