<?php

namespace App\Http\Controllers;

use App\Company;
use App\Province;
use App\Region;
use App\Study;
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
use App\ProfessionalLicense;
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
        $regions = Region::lists('name', 'id');
        $provinces = Province::lists('name', 'id');
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
        $professional_licenses = ProfessionalLicense::lists('name', 'id');
        $specialities = Speciality::lists('name', 'id');
        $manpowers = Manpower::lists('full_name', 'id');
        $exams = Exam::lists('name', 'id');
        $degrees = Degree::lists('name', 'id');

        return view('human-resources.manpowers.create', compact(
            'countries', 'genders', 'regions', 'provinces', 'communes', 'forecasts', 'mutualities',
            'pensions', 'companies', 'ratings', 'disabilities', 'diseases', 'relationships', 'certifications',
            'institutions', 'professional_licenses', 'specialities', 'manpowers', 'exams', 'degrees')
        );
    }


    /**
     * @param ManpowerRequest $request
     * @return mixed
     */
    public function step1(ManpowerRequest $request)
    {
        Session::put('step1', $request->all());
        Session::put('male_surname', $request->get('male_surname'));
        Session::put('female_surname', $request->get('female_surname'));
        Session::put('first_name', $request->get('first_name'));
        Session::put('second_name', $request->get('second_name'));
        Session::put('rut', $request->get('rut'));
        Session::put('birthday', $request->get('birthday'));
        Session::put('nationality_id', $request->get('nationality_id'));
        Session::put('gender_id', $request->get('gender_id'));
        Session::put('address', $request->get('address'));
        Session::put('region_id', $request->get('region_id'));
        Session::put('province_id', $request->get('province_id'));
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
        Session::put('step2', $request->all());
        Session::put('degree_id', $request->get('degree_id'));
        Session::put('name_study', $request->get('name_study'));
        Session::put('institution_study_id', $request->get('institution_study_id'));
        Session::put('date', $request->get('date'));
        Session::put('certification_id', $request->get('certification_id'));
        Session::put('expired_certification', $request->get('expired_certification'));
        Session::put('institution_certification_id', $request->get('institution_certification_id'));
        Session::put('speciality_id', $request->get('speciality_id'));
        Session::put('expired_speciality', $request->get('expired_speciality'));
        Session::put('institution_speciality_id', $request->get('institution_speciality_id'));
        Session::put('professional_license_id', $request->get('professional_license_id'));
        Session::put('expired_license', $request->get('expired_license'));
        Session::put('detail_license', $request->get('detail_license'));

        return response()->json(['status' => 'success'], 200);
    }


    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $manpower = Manpower::create(Session::get('step1'));
        $manpower->relationships()->attach(Session::get('relationship_id'));

        for ($i = 0; $i < count(Session::get('degree_id')); $i++) {

            $study = new Study([
                'degree_id'             => Session::get('degree_id')[$i],
                'name_study'            => Session::get('name_study')[$i],
                'institution_study_id'  => Session::get('institution_study_id')[$i],
                'date'                  => Session::get('date')[$i]

            ]);

            $manpower->studies()->save($study);
        }

    }

    public function show($id)
    {
        $manpower = Manpower::findOrFail($id);
        return view('human-resources.manpowers.show', compact('manpower'));
    }
}
