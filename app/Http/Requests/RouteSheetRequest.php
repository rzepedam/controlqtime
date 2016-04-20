<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

/**
 * @property mixed route
 */
class RouteSheetRequest extends SanitizedRequest
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
                    'num_sheet'     => 'required|max:20|unique:route_sheets',
                    'manpower_id'   => 'required|regex:/[0-9 -()+]+$/',
                    'turn'          => 'required|max:2'
                ];
            }

            case 'PUT':
            {
                return [
                    'num_sheet'     => 'required|max:20|unique:route_sheets,num_sheet,' . $this->route->getParameter('route_sheets'),
                    'manpower_id'   => 'required|regex:/[0-9 -()+]+$/',
                    'turn'          => 'required|max:2'
                ];
            }
        }
    }
}
