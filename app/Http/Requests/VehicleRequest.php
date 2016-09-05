<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Controlqtime\Http\Requests\Request;
use Illuminate\Routing\Route;

/**
 * @property Route route
 */
class VehicleRequest extends SanitizedRequest
{

    public function __construct(Route $route)
    {
        $this->route = $route;
    }
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'model_vehicle_id'  => 'required|regex:/[0-9 -()+]+$/',
                    'type_vehicle_id'   => 'required|regex:/[0-9 -()+]+$/',
                    'company_id'        => 'required|regex:/[0-9 -()+]+$/',
                    'state_vehicle_id'  => 'required|regex:/[0-9 -()+]+$/',
                    'acquisition_date'  => 'required|date',
                    'inscription_date'  => 'required|date',
                    'color'             => 'required|max:30',
                    'year'              => 'required|max:4',
                    'patent'            => 'required|max:15|unique:vehicles',
                    'fuel_id'           => 'required|regex:/[0-9 -()+]+$/',
					'num_chasis'        => 'required|max:17',
					'num_motor'         => 'required|max:12',
                    'km'                => 'required|max:7|regex:/[0-9 -()+]+$/',
                    'engine_cubic'      => 'required|max:4|regex:/[0-9 -()+]+$/',
                    'weight'            => 'required|regex:/[0-9 -()+]+$/',
                    'code'              => 'required'
                ];
            }

            case 'PUT':
            {
                return [
                    'model_vehicle_id'  => 'required|regex:/[0-9 -()+]+$/',
                    'type_vehicle_id'   => 'required|regex:/[0-9 -()+]+$/',
                    'company_id'        => 'required|regex:/[0-9 -()+]+$/',
                    'state_vehicle_id'  => 'required|regex:/[0-9 -()+]+$/',
                    'acquisition_date'  => 'required|date',
                    'inscription_date'  => 'required|date',
                    'color'             => 'required|max:30',
                    'year'              => 'required|max:4',
                    'patent'            => 'required|max:15|unique:vehicles,patent,' . $this->route->getParameter('vehicles'),
                    'fuel_id'           => 'required|regex:/[0-9 -()+]+$/',
					'num_chasis'        => 'required|max:17',
					'num_motor'         => 'required|max:12',
                    'km'                => 'required|max:7|regex:/[0-9 -()+]+$/',
                    'engine_cubic'      => 'required|max:4|regex:/[0-9 -()+]+$/',
                    'weight'            => 'required|regex:/[0-9 -()+]+$/',
                    'code'              => 'required'
                ];
            }
        }
    }
}
