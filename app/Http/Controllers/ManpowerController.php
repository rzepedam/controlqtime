<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Manpower;
use App\Gender;
use App\Rating;
use App\Commune;
use App\Country;
use App\Forecast;
use App\Disability;
use App\Disease;
use App\Kin;
use App\Certification;
use App\Institution;
use App\License;
use App\Speciality;
use App\Mutuality;
use App\Pension;
use App\Exam;


class ManpowerController extends Controller
{
    public function index(Request $request)
    {
        $manpowers = Manpower::name($request->get('table_search'))->orderBy('full_name')->paginate(25);
        return view('human-resources.manpowers.index', compact('manpowers'));
    }

    public function create()
    {
        $genders        = Gender::lists('name', 'id');
        $forecasts      = Forecast::lists('name', 'id');
        $countries      = Country::lists('name', 'id');
        $ratings        = Rating::lists('name', 'id');
        $communes       = Commune::lists('name', 'id');
        $disabilities   = Disability::lists('name', 'id');
        $diseases       = Disease::lists('name', 'id');
        $kins           = Kin::lists('name', 'id');
        $certifications = Certification::lists('name', 'id');
        $institutions   = Institution::lists('name', 'id');
        $licenses       = License::lists('name', 'id');
        $specialities   = Speciality::lists('name', 'id');
        $manpowers      = Manpower::lists('full_name', 'id');
        $mutualities    = Mutuality::lists('name', 'id');
        $pensions       = Pension::lists('name', 'id');
        $exams          = Exam::lists('name', 'id');

        return view('human-resources.manpowers.create', compact('genders', 'ratings', 'communes', 'countries', 'forecasts', 'disabilities', 'diseases', 'kins', 'certifications', 'institutions', 'licenses', 'specialities', 'manpowers', 'mutualities', 'pensions', 'exams'));
    }

    public function step1(Request $request)
    {
        $rules = [
            'email'             => 'required|email|unique:manpowers|max:100',
            'phone2'            => 'max:20',
            'phone1'            => 'required|max:20',
            'address'           => 'required',
            'commune_id'        => 'required',
            'subarea_id'        => 'required',
            'rating_id'         => 'required',
            'gender_id'         => 'required',
            'forecast_id'       => 'required',
            'country_id'        => 'required',
            'birthday'          => 'required',
            'rut'               => 'required',
            'second_name'       => 'max:30',
            'first_name'        => 'required|max:30',
            'female_surname'    => 'required|max:30',
            'male_surname'      => 'required|max:30',
        ];

        $v = Validator::make($request->all(), $rules);

        if($v->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $v->getMessageBag()->toArray()
            ], 400);
        }

        $this->saveSessionStep1($request);
        return response()->json(['status' => 'success'], 200);

    }

    public function step2(Request $request)
    {
        $this->saveSessionStep2($request);
        return response()->json(['status' => 'success'], 200);
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

    public function saveSessionStep1($request)
    {
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

        Session::put('count_family_relationship', $request->get('count_family_relationship'));
        for ($i = 0; $i < $request->get('count_family_relationship'); $i++) {
            Session::put('family_relationship' . $i, $request->get('family_relationship' . $i));
            Session::put('manpower' . $i, $request->get('manpower' . $i));
        }
    }

    public function saveSessionStep2($request)
    {
        //delete "," in string from view
        $count_img_disabilities = str_replace(',', '', $request->get('count_img_disabilities'));

        Session::put('count_img_disabilities', $count_img_disabilities);
        for ($i = 0; $i < $request->get('count_disabilities'); $i++) {
            for ($j = 0; $j < $count_img_disabilities[$i]; $j++) {
                Session::put($i . 'img_disabilities' . $j, $request->get($i . 'img_disability' . $j) );
            }
        }

        Session::put('count_disabilities', $request->get('count_disabilities'));
        for ($i = 0; $i < $request->get('count_disabilities'); $i++ ) {
            Session::put('disability' . $i, $request->get('disability' . $i));
            Session::put('treatment_disability' . $i, $request->get('treatment_disability' . $i));
            Session::put('detail_disability' . $i, $request->get('detail_disability' . $i));
        }

        Session::put('count_diseases', $request->get('count_diseases'));
        for ($i = 0; $i < $request->get('count_diseases'); $i++) {
            Session::put('disease' . $i, $request->get('disease' . $i));
            Session::put('treatment_disease' . $i, $request->get('treatment_disease' . $i));
            Session::put('detail_disease' . $i, $request->get('detail_disease' . $i));
        }

        Session::put('count_family_responsabilities', $request->get('count_family_responsabilities'));
        for ($i = 0; $i < $request->get('count_family_responsabilities'); $i++) {
            Session::put('name_responsability' . $i, $request->get('name_responsability' . $i));
            Session::put('rut' . $i, $request->get('rut' . $i));
            Session::put('kin_id' . $i, $request->get('kin_id' . $i));
        }
    }
}
