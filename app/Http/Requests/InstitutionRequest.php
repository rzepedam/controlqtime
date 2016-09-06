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
                    'name'                  => 'required|max:75|unique_with:institutions,type_institution_id',
                    'type_institution_id'   => 'required|regex:/[0-9 -()+]+$/'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'                  => 'required|max:75|unique_with:institutions,type_institution_id,' . $this->route->getParameter('institution'),
                    'type_institution_id'   => 'required|regex:/[0-9 -()+]+$/'
                ];
            }
        }
    }
}
