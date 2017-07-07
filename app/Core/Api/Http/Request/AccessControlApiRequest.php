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
    	switch ( request('num_device') )
		{
			case 'DDFF4EC6-182B-4E37-961D-28211D63E45B':
				$rules = [
					'rut' 			=> [ 'required', 'max:10', 'exists:employees,rut', 'unique_with:access_control_apis,created_at' ],
					'num_device' 	=> [ 'required', 'in:DDFF4EC6-182B-4E37-961D-28211D63E45B' ],
					'status' 		=> [ 'required' ],
					'created_at' 	=> [ 'required', 'date' ]
				];
				break;

			case '06787B04-2454-4896-ACEB-D459610C4E61':
				$rules = [
					'rut' 			=> [ 'required', 'max:10', 'exists:employees,rut', 'unique_with:daily_assistance_apis,created_at' ],
					'num_device' 	=> [ 'required', 'in:06787B04-2454-4896-ACEB-D459610C4E61' ],
					'status' 		=> [ 'required' ],
					'created_at' 	=> [ 'required', 'date' ]
				];
				break;

			default:
				// Se define cualquier Nº de dispositivo para que retorne mensaje de validación
				$rules = [
					'num_device' => ['in:JOIWWXP-763483HADJH-POLKSJSM' ]
				];
		}

		return $rules;
    }
}
