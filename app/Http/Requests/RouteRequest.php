<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
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
                    'name'  		=> 'required|max:5|unique_with:routes,terminal_id',
					'terminal_id' 	=> 'required|regex:/[0-9 -()+]+$/'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:5|unique_with:routes,terminal_id,' . $this->route->getParameter('route'),
					'terminal_id' 	=> 'required|regex:/[0-9 -()+]+$/'
                ];
            }
        }
    }
}
