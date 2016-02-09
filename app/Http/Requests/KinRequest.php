<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class KinRequest extends SanitizedRequest
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
                    'name'  => 'required|max:30|unique:kins',
                ];
            }

            case 'PUT':
            {
                return [
                    'name'      => 'required|max:30|unique:kins,name,' . $this->route->getParameter('kins')
                ];
            }
        }
    }
}