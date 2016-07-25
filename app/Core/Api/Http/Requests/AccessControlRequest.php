<?php

namespace Controlqtime\Core\Api\Http\Requests;

use Dingo\Api\Http\FormRequest as Request;

class AccessControlRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rut' 			=> 'required|max:15|unique:access_controls',
			'num_device'	=> 'required',
			'status' 		=> 'required',
			'created_at'	=> 'required'
        ];
    }
}
