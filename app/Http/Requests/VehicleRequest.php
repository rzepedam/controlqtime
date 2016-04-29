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
                    'type_vehicle_id'   => 'required|regex:/[0-9 -()+]+$/',
                    'model_vehicle_id'  => 'required|regex:/[0-9 -()+]+$/',
                    'terminal_id'       => 'required|regex:/[0-9 -()+]+$/',
                    'patent'            => 'required|max:15|unique:vehicles',
                    'year'              => 'required|max:4',
                    'code'              => 'required'
                ];
            }

            case 'PUT':
            {
                return [
                    'type_vehicle_id'   => 'required|regex:/[0-9 -()+]+$/',
                    'model_vehicle_id'  => 'required|regex:/[0-9 -()+]+$/',
                    'terminal_id'       => 'required|regex:/[0-9 -()+]+$/',
                    'patent'            => 'required|max:15|unique:vehicles,patent,' . $this->route->getParameter('vehicles'),
                    'year'              => 'required|max:4',
                    'code'              => 'required'
                ];
            }
        }
    }
}
