<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class LicenseRequest extends SanitizedRequest
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
                    'name'  => 'required|max:50|unique:licenses',
                ];
            }

            case 'PUT':
            {
                return [

                    'name'  => 'required|max:50|unique:licenses,name,' . $this->route->getParameter('licenses')
                ];
            }
        }
    }
}
