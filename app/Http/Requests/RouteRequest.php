<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;


/**
 * @property Route route
 */
class RouteRequest extends SanitizedRequest
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
                    'name'  => 'required|max:5|unique:routes'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:5|unique:routes,name,' . $this->route->getParameter('routes')
                ];
            }
        }
    }
}
