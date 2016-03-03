<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class CountryRequest extends SanitizedRequest
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
                    'name'  => 'required|max:50|unique:countries'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'      => 'required|max:50|unique:countries,name,' . $this->route->getParameter('countries')
                ];
            }
        }
    }
}
