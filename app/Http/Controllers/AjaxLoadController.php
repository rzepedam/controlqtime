<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Region;
use App\Province;

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
}
