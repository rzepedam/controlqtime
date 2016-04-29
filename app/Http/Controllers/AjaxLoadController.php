<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Manpower;
use Controlqtime\Round;
use Controlqtime\Trademark;
use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Controllers\Controller;

use Controlqtime\Region;
use Controlqtime\Province;
use Controlqtime\Company;
use Controlqtime\LegalRepresentative;
use Controlqtime\Subsidiary;
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

    /**
     * @param Request $request
	 *
	 * Carga modelo de vehículos en base a la selección
	 * de la marca que se realiza. Asociado a evento onChange
	 */
    public function loadModelVehicles(Request $request)
	{
		$model_vehicles = Trademark::find($request->get('id'))->modelVehicles;
		return $model_vehicles->lists('name', 'id');
	}


    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     *
     * Busca recorrido y bus asociado a la vuelta actual
     *
     */
    public function loadRouteAndVehicleSelectedInRound(Request $request)
	{
		$round = Round::with(['route', 'vehicle'])->find($request->get('id'));
        return $round;
	}
}
