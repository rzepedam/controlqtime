<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Region;
use App\Province;
use App\Company;

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
		}

		if ($first)
			return response()->json(['success' => false], 400);

		return response()->json(['success' => true], 200);
    }
}
