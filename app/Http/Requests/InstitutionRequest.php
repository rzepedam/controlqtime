<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class InstitutionRequest extends Request
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
                    'name'                  => 'required|max:75|unique:institutions',
                    'type_institution_id'   => 'required'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'                  => 'required|max:75|unique:institutions,name,' . $this->route->getParameter('institutions'),
                    'type_institution_id'   => 'required'
                ];
            }
        }
    }
}
