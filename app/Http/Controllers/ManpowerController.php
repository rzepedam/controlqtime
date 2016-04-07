<?php

namespace App\Http\Controllers;

use App\Company;
use App\Disability;
use App\Disease;
use App\Exam;
use App\FamilyResponsability;
use App\ProfessionalLicense;
use App\Province;
use App\Region;
use App\Speciality;
use App\Study;
use App\TypeCertification;
use App\TypeProfessionalLicense;
use App\TypeSpeciality;
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
use App\TypeDisability;
use App\TypeDisease;
use App\Certification;
use App\Institution;
use App\Mutuality;
use App\Pension;
use App\TypeExam;
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
        $type_disabilities = TypeDisability::lists('name', 'id');
        $type_diseases = TypeDisease::lists('name', 'id');
        $relationships = Relationship::lists('name', 'id');
        $type_certifications = TypeCertification::lists('name', 'id');
        $institutions = Institution::lists('name', 'id');
        $type_professional_licenses = TypeProfessionalLicense::lists('name', 'id');
        $type_specialities = TypeSpeciality::lists('name', 'id');
        $manpowers = Manpower::lists('full_name', 'id');
        $type_exams = TypeExam::lists('name', 'id');
        $degrees = Degree::lists('name', 'id');

        return view('human-resources.manpowers.create', compact(
            'countries', 'genders', 'regions', 'provinces', 'communes', 'forecasts', 'mutualities',
            'pensions', 'companies', 'ratings', 'relationships', 'manpowers', 'degrees', 'institutions',
            'type_certifications', 'type_specialities', 'type_professional_licenses',
            'type_disabilities', 'type_diseases', 'type_exams')
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
        Session::put('type_certification_id', $request->get('type_certification_id'));
        Session::put('expired_certification', $request->get('expired_certification'));
        Session::put('institution_certification_id', $request->get('institution_certification_id'));
        Session::put('type_speciality_id', $request->get('type_speciality_id'));
        Session::put('expired_speciality', $request->get('expired_speciality'));
        Session::put('institution_speciality_id', $request->get('institution_speciality_id'));
        Session::put('type_professional_license_id', $request->get('type_professional_license_id'));
        Session::put('expired_license', $request->get('expired_license'));
        Session::put('detail_license', $request->get('detail_license'));

        return response()->json(['status' => 'success'], 200);
    }


    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        /*
         * Step 1
         */
        
        $manpower = Manpower::create(Session::get('step1'));
        $manpower->relationships()->attach(Session::get('relationship_id'));

        /*
         * Step 2
         */

        for ($i = 0; $i < count(Session::get('degree_id')); $i++) {

            $study = new Study([
                'degree_id'             => Session::get('degree_id')[$i],
                'name_study'            => Session::get('name_study')[$i],
                'institution_study_id'  => Session::get('institution_study_id')[$i],
                'date'                  => Session::get('date')[$i]

            ]);

            $manpower->studies()->save($study);
        }

        for($i = 0; $i < count(Session::get('type_certification_id')); $i++) {

            $certification = new Certification([
                'type_certification_id'         => Session::get('type_certification_id')[$i],
                'expired_certification'         => Session::get('expired_certification')[$i],
                'institution_certification_id'  => Session::get('institution_certification_id')[$i],
            ]);
            
            $manpower->certifications()->save($certification);

        }

        for ($i = 0; $i < count(Session::get('type_speciality_id')); $i++) {

            $speciality = new Speciality([
                'type_speciality_id'            => Session::get('type_speciality_id')[$i],
                'expired_speciality'            => Session::get('expired_speciality')[$i],
                'institution_speciality_id'     => Session::get('institution_speciality_id')[$i]
            ]);

            $manpower->specialities()->save($speciality);

        }

        for ($i = 0; $i < count(Session::get('type_professional_license_id')); $i ++) {

            $professional_license = new ProfessionalLicense([
                'type_professional_license_id'  => Session::get('type_professional_license_id')[$i],
                'expired_license'               => Session::get('expired_license')[$i],
                'detail_license'                => Session::get('detail_license')[$i]
            ]);

            $manpower->professionalLicenses()->save($professional_license);

        }

        /*
         * Step 3
         */

        for ($i = 0; $i < count($request->get('type_disability_id')); $i++) {

            $disability = new Disability([
                'type_disability_id'        => $request->get('type_disability_id')[$i],
                'treatment_disability'      => $request->get('treatment_disability' . $i),
                'detail_disability'         => $request->get('detail_disability')[$i]
            ]);

            $manpower->disabilities()->save($disability);

        }

        for ($i = 0; $i < count($request->get('type_disease_id')); $i++) {

            $disease = new Disease([
                'type_disease_id'   => $request->get('type_disease_id')[$i],
                'treatment_disease' => $request->get('treatment_disease' . $i),
                'detail_disease'    => $request->get('detail_disease')[$i]
            ]);

            $manpower->diseases()->save($disease);

        }

        for ($i = 0; $i < count($request->get('type_exam_id')); $i++) {

            $exam = new Exam([
                'type_exam_id'  => $request->get('type_exam_id')[$i],
                'expired_exam'  => $request->get('expired_exam')[$i],
                'detail_exam'   => $request->get('detail_exam')[$i]
            ]);

            $manpower->exams()->save($exam);

        }

        for ($i = 0; $i < count($request->get('name_responsability')); $i++) {

            $family_responsability = new FamilyResponsability([
                'name_responsability'   => $request->get('name_responsability')[$i],
                'rut'                   => $request->get('rut')[$i],
                'relationship_id'       => $request->get('relationship_id')[$i]
            ]);
            
            $manpower->familyResponsabilities()->save($family_responsability);
            
        }

        $response = array(
            'status' => 'success',
            'url' => '/human-resources/manpowers'
        );

        return response()->json([$response], 200);
        
    }

    public function show($id)
    {
        $manpower = Manpower::with([
            'company', 'nationality', 'gender', 'relationships', 'studies', 'certifications', 'specialities',
            'professionalLicenses', 'disabilities', 'diseases', 'exams', 'familyResponsabilities'
        ])->findOrFail($id);
        
        return view('human-resources.manpowers.show', compact('manpower'));
    }
}
