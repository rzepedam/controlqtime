<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Area;
use Controlqtime\Http\Requests\Step1Request;
use Controlqtime\Company;
use Controlqtime\Disability;
use Controlqtime\Disease;
use Controlqtime\Exam;
use Controlqtime\FamilyRelationship;
use Controlqtime\FamilyResponsability;
use Controlqtime\Http\Requests\Step2Request;
use Controlqtime\Http\Requests\Step3Request;
use Controlqtime\ProfessionalLicense;
use Controlqtime\Province;
use Controlqtime\Region;
use Controlqtime\Speciality;
use Controlqtime\Study;
use Controlqtime\TypeCertification;
use Controlqtime\TypeProfessionalLicense;
use Controlqtime\TypeSpeciality;
use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;

use Controlqtime\Relationship;
use Controlqtime\Manpower;
use Controlqtime\Gender;
use Controlqtime\Rating;
use Controlqtime\Country;
use Controlqtime\Forecast;
use Controlqtime\TypeDisability;
use Controlqtime\TypeDisease;
use Controlqtime\Certification;
use Controlqtime\Institution;
use Controlqtime\Mutuality;
use Controlqtime\Pension;
use Controlqtime\TypeExam;
use Controlqtime\Degree;

class ManpowerController extends Controller
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $manpowers = Manpower::with(['dailyAssistances'])->orderBy('id', 'DESC')->paginate(25);
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
        $firstRegion = Region::first();
        $provinces = Region::find($firstRegion->id)->provinces->lists('name', 'id');
        $firstProvince = Province::first();
        $communes = Province::find($firstProvince->id)->communes->lists('name', 'id');
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
        $areas = Area::lists('name', 'id');

        return view('human-resources.manpowers.create', compact(
            'countries', 'genders', 'regions', 'provinces', 'communes', 'forecasts', 'mutualities',
            'pensions', 'companies', 'ratings', 'relationships', 'manpowers', 'degrees', 'institutions',
            'type_certifications', 'type_specialities', 'type_professional_licenses',
            'type_disabilities', 'type_diseases', 'type_exams', 'areas'
        ));
    }


    /**
     * @param Step1Request $request
     *
     * @return mixed
     */
    public function step1(Step1Request $request)
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
        Session::put('area_id', $request->get('area_id'));
        Session::put('code_internal', $request->get('code_internal'));
        Session::put('count_family_relationships', $request->get('count_family_relationships'));

        for($i = 0; $i < $request->get('count_family_relationships'); $i++) {
            Session::put('relationship_id' . $i, $request->get('relationship_id' . $i));
            Session::put('manpower_family_id' . $i, $request->get('manpower_family_id' . $i));
        }

        return response()->json([
            'status' => 'OK'
        ]);

    }


    /**
     * @param Step2Request $request
     *
     * @return mixed
     */
    public function step2(Step2Request $request)
    {
        Session::put('step2', $request->all());
        Session::put('count_studies', $request->get('count_studies'));

        for ($i = 0; $i < Session::get('count_studies'); $i++) {
            Session::put('degree_id' . $i, $request->get('degree_id' . $i));
            Session::put('name_study' . $i, $request->get('name_study' . $i));
            Session::put('institution_study_id' . $i, $request->get('institution_study_id' . $i));
            Session::put('date_obtention' . $i, $request->get('date_obtention' . $i));
        }

        Session::put('count_certifications', $request->get('count_certifications'));

        for ($i = 0; $i < $request->get('count_certifications'); $i++) {
            Session::put('type_certification_id' . $i, $request->get('type_certification_id' . $i));
            Session::put('expired_certification' . $i, $request->get('expired_certification' . $i));
            Session::put('institution_certification_id' . $i, $request->get('institution_certification_id' . $i));
        }

        Session::put('count_specialities', $request->get('count_specialities'));

        for ($i = 0; $i < $request->get('count_specialities'); $i++) {
            Session::put('type_speciality_id' . $i, $request->get('type_speciality_id' . $i));
            Session::put('expired_speciality' . $i, $request->get('expired_speciality' . $i));
            Session::put('institution_speciality_id' . $i, $request->get('institution_speciality_id' . $i));
        }

        Session::put('count_professional_licenses', $request->get('count_professional_licenses'));

        for($i = 0; $i < $request->get('count_professional_licenses'); $i++) {
            Session::put('type_professional_license_id' . $i, $request->get('type_professional_license_id' . $i));
            Session::put('emission_license' . $i, $request->get('emission_license' . $i));
            Session::put('expired_license' . $i, $request->get('expired_license' . $i));
            Session::put('is_donor' . $i, $request->get('is_donor' . $i));
            Session::put('detail_license' . $i, $request->get('detail_license' . $i));
        }

        return response()->json([
            'status' => 'OK'
        ]);
    }


    /**
     * @param Step3Request $request
     *
     * @return mixed
     */
    public function store(Step3Request $request)
    {
        /*
         * Step 1
         */

        $manpower = Manpower::create(Session::get('step1'));

        for ($i = 0; $i < Session::get('count_family_relationships'); $i++) {

            $family_relationship = new FamilyRelationship([
                'relationship_id'       => Session::get('relationship_id' . $i),
                'manpower_family_id'    => Session::get('manpower_family_id' . $i)
            ]);

            $manpower->familyRelationships()->save($family_relationship);

        }

        /*
         * Step 2
         */

        for ($i = 0; $i < Session::get('count_studies'); $i++) {

            $study = new Study([
                'degree_id'             => Session::get('degree_id' . $i),
                'name_study'            => Session::get('name_study' . $i),
                'institution_study_id'  => Session::get('institution_study_id' . $i),
                'date'                  => Session::get('date' . $i)

            ]);
            
            $manpower->studies()->save($study);
        }

        for($i = 0; $i < Session::get('count_certifications'); $i++) {

            $certification = new Certification([
                'type_certification_id'         => Session::get('type_certification_id' . $i),
                'expired_certification'         => Session::get('expired_certification' . $i),
                'institution_certification_id'  => Session::get('institution_certification_id' . $i),
            ]);

            $manpower->certifications()->save($certification);

        }

        for ($i = 0; $i < Session::get('count_specialities'); $i++) {

            $speciality = new Speciality([
                'type_speciality_id'            => Session::get('type_speciality_id' . $i),
                'expired_speciality'            => Session::get('expired_speciality' . $i),
                'institution_speciality_id'     => Session::get('institution_speciality_id' . $i)
            ]);

            $manpower->specialities()->save($speciality);

        }

        for ($i = 0; $i < Session::get('count_professional_licenses'); $i ++) {

            $professional_license = new ProfessionalLicense([
                'type_professional_license_id'  => Session::get('type_professional_license_id' . $i),
                'emission_license'              => Session::get('emission_license' . $i),
                'expired_license'               => Session::get('expired_license' . $i),
                'is_donor'                      => Session::get('is_donor' . $i),
                'detail_license'                => Session::get('detail_license' . $i)
            ]);

            $manpower->professionalLicenses()->save($professional_license);

        }

        /*
         * Step 3
         */

        for ($i = 0; $i < $request->get('count_disabilities'); $i++) {

            $disability = new Disability([
                'type_disability_id'        => $request->get('type_disability_id' . $i),
                'treatment_disability'      => $request->get('treatment_disability' . $i),
                'detail_disability'         => $request->get('detail_disability' . $i)
            ]);

            $manpower->disabilities()->save($disability);

        }

        for ($i = 0; $i < $request->get('count_diseases'); $i++) {

            $disease = new Disease([
                'type_disease_id'   => $request->get('type_disease_id' . $i),
                'treatment_disease' => $request->get('treatment_disease' . $i),
                'detail_disease'    => $request->get('detail_disease' . $i)
            ]);

            $manpower->diseases()->save($disease);

        }

        for ($i = 0; $i < $request->get('count_exams'); $i++) {

            $exam = new Exam([
                'type_exam_id'  => $request->get('type_exam_id' . $i),
                'expired_exam'  => $request->get('expired_exam' . $i),
                'detail_exam'   => $request->get('detail_exam' . $i)
            ]);

            $manpower->exams()->save($exam);

        }

        for ($i = 0; $i < $request->get('count_family_responsabilities'); $i++) {

            $family_responsability = new FamilyResponsability([
                'name_responsability'   => $request->get('name_responsability' . $i),
                'rut_responsability'    => $request->get('rut_responsability' . $i),
                'relationship_id'       => $request->get('relationship_id' . $i)
            ]);

            $manpower->familyResponsabilities()->save($family_responsability);

        }

        $response = array(
            'status' => 'success',
            'url' => '/human-resources/manpowers'
        );

        $this->destroyManpowerData();
        return response()->json([$response], 200);

    }


    /**
     * @param $id
     */
    public function edit($id)
    {
        $manpower = Manpower::with([
            'company', 'nationality', 'gender', 'familyRelationships', 'studies', 'certifications', 'specialities',
            'professionalLicenses', 'disabilities', 'diseases', 'exams', 'familyResponsabilities', 'area'
        ])->findOrFail($id);
        
        $countries                  = Country::lists('name', 'id');
        $genders                    = Gender::lists('name', 'id');
        $regions                    = Region::lists('name', 'id');
        $regionSelected             = $manpower->commune->province->region;
        $provinces                  = Region::find($regionSelected->id)->provinces->lists('name', 'id');
        $provinceSelected           = $manpower->commune->province;
        $communes                   = Province::find($provinceSelected->id)->communes->lists('name', 'id');
        $forecasts                  = Forecast::lists('name', 'id');
        $mutualities                = Mutuality::lists('name', 'id');
        $pensions                   = Pension::lists('name', 'id');
        $companies                  = Company::lists('firm_name', 'id');
        $ratings                    = Rating::lists('name', 'id');
        $relationships              = Relationship::lists('name', 'id');
        $manpowers                  = Manpower::lists('full_name', 'id');
        $degrees                    = Degree::lists('name', 'id');
        $institutions               = Institution::lists('name', 'id');
        $type_certifications        = TypeCertification::lists('name', 'id');
        $type_specialities          = TypeSpeciality::lists('name', 'id');
        $type_professional_licenses = TypeProfessionalLicense::lists('name', 'id');
        $type_disabilities          = TypeDisability::lists('name', 'id');
        $type_diseases              = TypeDisease::lists('name', 'id');
        $type_exams                 = TypeExam::lists('name', 'id');
        $areas                      = Area::lists('name', 'id');

        return view('human-resources.manpowers.edit', compact(
            'manpower', 'countries', 'genders', 'regions', 'regionSelected', 'provinces', 'provinceSelected',
            'communes', 'forecasts', 'mutualities', 'pensions', 'companies', 'ratings', 'relationships', 'manpowers',
            'degrees', 'institutions', 'type_certifications', 'type_specialities', 'type_professional_licenses',
            'type_disabilities', 'type_diseases', 'type_exams', 'areas'
        ));

    }



    public function updateStep1(Step1Request $request, $id)
    {
        dd($request->all());
        $manpower = Manpower::find($id);
        $manpower->fill($request->all());
        $manpower->save();
    }
    
    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $manpower = Manpower::with([
            'company', 'nationality', 'gender', 'familyRelationships', 'studies', 'certifications', 'specialities',
            'professionalLicenses', 'disabilities', 'diseases', 'exams', 'familyResponsabilities', 'area'
        ])->findOrFail($id);

        return view('human-resources.manpowers.show', compact('manpower'));
        
    }


    /**
     * @return mixed
     */
    public function destroyManpowerData() {
        
        Session::forget('step1');
        Session::forget('male_surname');
        Session::forget('female_surname');
        Session::forget('first_name');
        Session::forget('second_name');
        Session::forget('rut');
        Session::forget('birthday');
        Session::forget('nationality_id');
        Session::forget('gender_id');
        Session::forget('address');
        Session::forget('region_id');
        Session::forget('province_id');
        Session::forget('commune_id');
        Session::forget('email');
        Session::forget('phone1');
        Session::forget('phone2');
        Session::forget('forecast_id');
        Session::forget('mutuality_id');
        Session::forget('pension_id');
        Session::forget('company_id');
        Session::forget('rating_id');
        Session::forget('area_id');
        Session::forget('code_internal');

        for ($i = 0; $i < Session::get('count_family_relationships'); $i++) {
            Session::forget('relationship_id' . $i);
            Session::forget('manpower_family_id' . $i);
        }

        Session::forget('count_family_relationships');
        Session::forget('step2');

        for ($i = 0; $i < Session::get('count_studies'); $i++) {
            Session::forget('degree_id' . $i);
            Session::forget('name_study' . $i);
            Session::forget('institution_study_id' . $i);
            Session::forget('date_obtention' . $i);
        }

        for ($i = 0; $i < Session::get('count_certifications'); $i++) {
            Session::forget('type_certification_id' . $i);
            Session::forget('expired_certification' . $i);
            Session::forget('institution_certification_id' . $i);
        }

        for ($i = 0; $i < Session::get('count_specialities'); $i++) {
            Session::forget('type_speciality_id' . $i);
            Session::forget('expired_speciality' . $i);
            Session::forget('institution_speciality_id' . $i);
        }

        for ($i = 0; $i < Session::get('count_professional_licenses'); $i++) {
            Session::forget('type_professional_license_id' . $i);
            Session::forget('emission_license' . $i);
            Session::forget('expired_license' . $i);
            Session::forget('is_donor' . $i);
            Session::forget('detail_license' . $i);
        }

        Session::forget('count_studies');
        Session::forget('count_certifications');
        Session::forget('count_specialities');
        Session::forget('count_professional_licenses');
        
        return response()->json([
            'success' => true
        ], 200);
    }
    
}
