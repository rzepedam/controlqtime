<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

/**
 * @property Route route
 */
class TypeVehicleRequest extends SanitizedRequest
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
                    'name'              => 'required|max:50|unique:type_vehicles',
                    'weight_id'         => 'required|regex:/[0-9 -()+]+$/',
                    'engine_cubic_id'   => 'required|regex:/[0-9 -()+]+$/'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'              => 'required|max:50|unique:type_vehicles,name,' . $this->route->getParameter('type_vehicle'),
                    'weight_id'         => 'required|regex:/[0-9 -()+]+$/',
                    'engine_cubic_id'   => 'required|regex:/[0-9 -()+]+$/'
                ];
            }
        }
    }
}
