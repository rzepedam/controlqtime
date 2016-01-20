<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class DisabilityRequest extends SanitizedRequest
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
                    'name'  => 'required|max:120|unique:disabilities',
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:120|unique:disabilities,name,' . $this->route->getParameter('disabilities')
                ];
            }
        }
    }
}
