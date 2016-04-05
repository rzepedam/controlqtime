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

class AjaxLoadController extends Controller
{
    public function loadProvinces(Request $request) {
    	$provinces = Region::find($request->get('id'))->provinces;
		return $provinces->lists('name', 'id');
    }

    public function loadCommunes(Request $request) {
    	$communes = Province::find($request->get('id'))->communes;
		return $communes->lists('name', 'id');
    }

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
}
