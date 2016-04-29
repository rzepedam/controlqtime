<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Request;
use Illuminate\Routing\Route;

/**
 * @property Route route
 */
class RoundRequest extends Request
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
                    'route_id'  => 'required|regex:/[0-9 -()+]+$/',
                    'vehicle_id'  => 'required|regex:/[0-9 -()+]+$/',
                ];
            }

            case 'PUT':
            {
                return [
                    'route_id'  => 'required|regex:/[0-9 -()+]+$/',
                    'vehicle_id'  => 'required|regex:/[0-9 -()+]+$/',
                ];
            }
        }
    }
}
