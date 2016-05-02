<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class InstitutionRequest extends SanitizedRequest
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
                    //'name'                  => 'required|max:75|unique:institutions',
                    'name'                  => 'required|max:75',
                    'type_institution_id'   => 'required'
                ];
            }

            case 'PUT':
            {
                return [
                    //'name'                  => 'required|max:75|unique:institutions,name,' . $this->route->getParameter('institutions'),
                    'name'                  => 'required|max:75',
                    'type_institution_id'   => 'required'
                ];
            }
        }
    }
}
