<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class EngineCubicRequest extends SanitizedRequest
{
    private $route;

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
                    'name'  => 'required|max:30|unique:engine_cubics',
                    'acr'   => 'required|max:5|unique:engine_cubics'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:30|unique:engine_cubics,name,' . $this->route->getParameter('engine_cubics'),
                    'acr'   => 'required|max:5|unique:engine_cubics,acr,' . $this->route->getParameter('engine_cubics')
                ];
            }
        }
    }
}
