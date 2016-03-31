<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

use App\Relationship;
use App\Manpower;
use App\Gender;
use App\Rating;
use App\Commune;
use App\Country;
use App\Forecast;
use App\Disability;
use App\Disease;
use App\Certification;
use App\Institution;
use App\License;
use App\Speciality;
use App\Mutuality;
use App\Pension;
use App\Exam;
use App\Degree;
use App\Http\Requests\ManpowerRequest;

class ManpowerController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $manpowers = Manpower::name($request->get('table_search'))->orderBy('full_name')->paginate(25);
        return view('human-resources.manpowers.index', compact('manpowers'));
    }


    /**
     * @return mixed
     */
    public function create()
    {
        $countries = Country::lists('name', 'id');
        $genders = Gender::lists('name', 'id');
        $communes = Commune::lists('name', 'id');
        $forecasts = Forecast::lists('name', 'id');
        $mutualities = Mutuality::lists('name', 'id');
        $pensions = Pension::lists('name', 'id');
        $companies = Company::where('status', true)->lists('firm_name', 'id');
        $ratings = Rating::lists('name', 'id');
        $disabilities = Disability::lists('name', 'id');
        $diseases = Disease::lists('name', 'id');
        $relationships = Relationship::lists('name', 'id');
        $certifications = Certification::lists('name', 'id');
        $institutions = Institution::lists('name', 'id');
        $licenses = License::lists('name', 'id');
        $specialities = Speciality::lists('name', 'id');
        $manpowers = Manpower::lists('full_name', 'id');
        $exams = Exam::lists('name', 'id');
        $degrees = Degree::lists('name', 'id');

        return view('human-resources.manpowers.create', compact('genders', 'ratings', 'communes', 'countries', 'forecasts', 'companies', 'disabilities', 'diseases', 'relationships', 'certifications', 'institutions', 'licenses', 'specialities', 'manpowers', 'mutualities', 'pensions', 'exams', 'degrees'));
    }


    /**
     * @param ManpowerRequest $request
     * @return mixed
     */
    public function step1(ManpowerRequest $request)
    {
        Session::put('male_surname', $request->get('male_surname'));
        Session::put('female_surname', $request->get('female_surname'));
        Session::put('first_name', $request->get('first_name'));
        Session::put('second_name', $request->get('second_name'));
        Session::put('rut', $request->get('rut'));
        Session::put('birthday', $request->get('birthday'));
        Session::put('nationality_id', $request->get('nationality_id'));
        Session::put('gender_id', $request->get('gender_id'));
        Session::put('address', $request->get('address'));
        Session::put('commune_id', $request->get('commune_id'));
        Session::put('email', $request->get('email'));
        Session::put('phone1', $request->get('phone1'));
        Session::put('phone2', $request->get('phone2'));
        Session::put('forecast_id', $request->get('forecast_id'));
        Session::put('mutuality_id', $request->get('mutuality_id'));
        Session::put('pension_id', $request->get('pension_id'));
        Session::put('company_id', $request->get('company_id'));
        Session::put('rating_id', $request->get('rating_id'));
        Session::put('relationship_id', $request->get('relationship_id'));
        Session::put('manpower_id', $request->get('manpower_id'));

        return response()->json(['status' => 'success'], 200);

    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function step2(Request $request)
    {
        dd($request->all());
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

        return response()->json(['status' => 'success'], 200);
    }


    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $manpower = Manpower::findOrFail($id);
        return view('human-resources.manpowers.show', compact('manpower'));
    }
}
