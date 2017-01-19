<?php

namespace Controlqtime\Core\Api\Http\Request;

use Illuminate\Support\Facades\Request;
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
		switch ( Request::get('num_device') )
		{
			case 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA':
				$rules = [
					'rut'        => 'required|max:10|unique_with:access_control_apis,created_at',
					'num_device' => 'required',
					'status'     => 'required',
					'created_at' => 'required|date'
				];
				
				return $rules;
			
			case '187783A1-7985-4839-B8C1-2F0ACC290E13':
				$rules = [
					'rut'        => 'required|max:10|unique_with:daily_assistance_apis,created_at',
					'num_device' => 'required',
					'status'     => 'required',
					'created_at' => 'required|date'
				];
				
				return $rules;
			
			default:
				$rules = [
					'rut'        => 'required|max:10',
					'num_device' => 'required',
					'status'     => 'required',
					'created_at' => 'required|date'
				];
				
				return $rules;
		}
	}
	
	public function messages()
	{
		return [
			'unique_with' => 'La combinación de valores ingresados ya existe.'
		];
	}
}
