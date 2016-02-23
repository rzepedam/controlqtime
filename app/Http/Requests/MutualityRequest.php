<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class MutualityRequest extends SanitizedRequest
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
                    'name'  => 'required|max:75|unique:mutualities'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:75|unique:mutualities,name,' . $this->route->getParameter('mutualities')
                ];
            }
        }
    }
}
