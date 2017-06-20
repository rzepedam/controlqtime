<?php

namespace Controlqtime\Core\Api\Http\Request;

use Controlqtime\Http\Requests\Request;

class AccessControlApiRequest extends Request
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
        switch (request('num_device')) {
            case 'DDFF4EC6-182B-4E37-961D-28211D63E45B':
                $rules = [
                    'rut'        => 'required|max:10|unique_with:access_control_apis,created_at',
                    'num_device' => 'required',
                    'status'     => 'required',
                    'created_at' => 'required|date',
                ];

                return $rules;

            case '06787B04-2454-4896-ACEB-D459610C4E61':
                $rules = [
                    'rut'        => 'required|max:10|unique_with:daily_assistance_apis,created_at',
                    'num_device' => 'required',
                    'status'     => 'required',
                    'created_at' => 'required|date',
                ];

                return $rules;
        }
    }

    public function messages()
    {
        return ['unique_with' => 'La combinación de valores ingresados ya existe.'];
    }
}
