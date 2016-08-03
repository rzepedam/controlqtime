<?php

namespace Controlqtime\Core\Api\Http\Requests;

use Dingo\Api\Http\FormRequest as Request;

class EmployeeRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'rut' 			=> 'required',
			'url'			=> 'required|url|unique:employees',
        ];
    }
}
