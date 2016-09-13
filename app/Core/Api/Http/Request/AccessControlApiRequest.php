<?php

namespace Controlqtime\Core\Api\Http\Request;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class AccessControlApiRequest extends SanitizedRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'rut' 			=> 'required|max:10|unique_with:access_control_apis,created_at',
			'num_device'	=> 'required',
			'status' 		=> 'required',
			'created_at'	=> 'required|date'
        ];
    }
}
