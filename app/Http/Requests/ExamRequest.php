<?php

namespace App\Http\Requests;

use Illuminate\Routing\Route;
use App\Http\Requests\Forms\SanitizedRequest;

class ExamRequest extends SanitizedRequest
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
                    'name'  => 'required|max:75|unique:exams'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:75|unique:exams,name,' . $this->route->getParameter('exams')
                ];
            }
        }
    }
}
