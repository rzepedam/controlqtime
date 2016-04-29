<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;
use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class TypeExamRequest extends SanitizedRequest
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
                    'name'  => 'required|max:75|unique:type_exams'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:75|unique:type_exams,name,' . $this->route->getParameter('type_exams')
                ];
            }
        }
    }
}
