<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class ForecastRequest extends SanitizedRequest
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
                    'name'  => 'required|max:50|unique:forecasts',
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:50|unique:forecasts,name,' . $this->route->getParameter('forecasts')
                ];
            }
        }
    }
}
