<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class TypeCertificationRequest extends SanitizedRequest
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
                    'name'  => 'required|max:100|unique:type_certifications'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:100|unique:type_certifications,name,' . $this->route->getParameter('type_certification')
                ];
            }
        }
    }
}
