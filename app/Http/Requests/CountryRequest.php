<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class CountryRequest extends Request
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
                    'id'    => 'required|unique:countries',
                    'name'  => 'required|unique:countries',
                ];
            }

            case 'PUT':
            {
                return [
                    'id'        => 'required|unique:countries,id,' . $this->route->getParameter('countries'),
                    'name'      => 'required|unique:countries,name,' . $this->route->getParameter('countries')
                ];
            }
        }
    }
}
