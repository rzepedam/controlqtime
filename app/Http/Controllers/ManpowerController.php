<?php

namespace App\Http\Controllers;

use App\Disability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

use App\Manpower;
use App\Gender;
use App\Rating;
use App\Commune;
use App\Country;
use App\Forecast;
use Illuminate\Support\Facades\Validator;


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

    public function step1(Request $request)
    {
        if($request->ajax()) {

            $this->validate($request, [
                'male_surname'   => 'required|max:30',
                'female_surname' => 'required'
            ]);

            Session::put('male_surname', $request->get('male_surname'));
            Session::put('female_surname', $request->get('female_surname'));
            Session::put('first_name', $request->get('first_name'));
            Session::put('second_name', $request->get('second_name'));
            Session::put('rut', $request->get('rut'));
            Session::put('birthday', $request->get('birthday'));
            Session::put('forecast_id', $request->get('forecast_id'));
            Session::put('country_id', $request->get('country_id'));
            Session::put('gender_id', $request->get('gender_id'));
            Session::put('rating_id', $request->get('rating_id'));
            Session::put('subarea_id', $request->get('subarea_id'));
            Session::put('commune_id', $request->get('commune_id'));
            Session::put('address', $request->get('address'));
            Session::put('phone1', $request->get('phone1'));
            Session::put('phone2', $request->get('phone2'));
            Session::put('email', $request->get('email'));
        }
    }

    public function step2()
    {

    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show($id)
    {
        $manpower = Manpower::findOrFail($id);
        return view('human-resources.manpowers.show', compact('manpower'));
    }
}
