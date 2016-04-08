<?php

namespace App\Http\Controllers;

use App\Manpower;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Region;
use App\Province;
use App\Company;
use App\LegalRepresentative;
use App\Subsidiary;
use Illuminate\Support\Facades\Session;

class AjaxLoadController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function loadProvinces(Request $request) {
    	$provinces = Region::find($request->get('id'))->provinces;
		return $provinces->lists('name', 'id');
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function loadCommunes(Request $request) {
    	$communes = Province::find($request->get('id'))->communes;
		return $communes->lists('name', 'id');
    }


	/**
	 * @param Request $request
	 * @return mixed
     */
	public function verificaEmail(Request $request) {
		
		switch($request->get('element'))
		{
			case 'Company':
				$first = Company::where('email', $request->get('email'))->first();
			break;

			case 'Representative':
				$first = LegalRepresentative::where('email', $request->get('email'))->first();
			break;

			case 'Subsidiary':
				$first = Subsidiary::where('email', $request->get('email'))->first();
			break;

			case 'Manpower':
				$first = Manpower::where('email', $request->get('email'))->first();
		}

		if ($first)
			return response()->json(['success' => false], 400);

		return response()->json(['success' => true], 200);
    }


    public function destroySessionData() {
        
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
        Session::forget('relationship_id');
        Session::forget('manpower_id');
        Session::forget('step2');
        Session::forget('degree_id');
        Session::forget('name_study');
        Session::forget('institution_study_id');
        Session::forget('date');
        Session::forget('type_certification_id');
        Session::forget('expired_certification');
        Session::forget('institution_certification_id');
        Session::forget('type_speciality_id');
        Session::forget('expired_speciality');
        Session::forget('institution_speciality_id');
        Session::forget('type_professional_license_id');
        Session::forget('expired_license');
        Session::forget('detail_license');

        return response()->json(['success' => true], 200);
    }
}
