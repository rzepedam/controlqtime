<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class WeightRequest extends SanitizedRequest
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
                    'name'  => 'required|max:30|unique_with:weights,acr',
                    'acr'   => 'required|max:5|unique:weights'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:30|unique_with:weights,acr,' . $this->route->getParameter('weight'),
                    'acr'   => 'required|max:5'
                ];
            }
        }
    }
}
