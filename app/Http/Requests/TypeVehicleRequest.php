<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
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
                    'name'  => 'required|max:50|unique:type_vehicles'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'      => 'required|max:50|unique:type_vehicles,name,' . $this->route->getParameter('type_vehicles')
                ];
            }
        }
    }
}
