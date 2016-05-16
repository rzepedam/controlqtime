<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class FuelRequest extends SanitizedRequest
{
    protected $route;

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
                    'name'  => 'required|max:10|unique:fuels'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:10|unique:fuels,name,' . $this->route->getParameter('fuels')
                ];
            }
        }
    }
    
}
