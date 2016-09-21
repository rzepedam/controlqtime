<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;
use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class CheckVehicleFormRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * CheckVehicleFormRequest constructor.
	 *
	 * @param Route $route
	 */
	public function __construct(Route $route)
	{
		$this->route = $route;
	}
	
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
		switch ($this->method())
		{
			case 'POST':
			{
				$rules = [
					'vehicle_id' => 'required|regex:/[0-9 -()+]+$/',
				];
				
				foreach (range(0, count(Request::get('state_piece_vehicle_id')) - 1) as $index)
				{
					$rules['state_piece_vehicle_id.' . $index] = 'required|regex:/[0-9 -()+]+$/';
				}
				
				return $rules;
			}
			
			case 'PUT':
			{
				$rules = [
					'vehicle_id'             => 'required|regex:/[0-9 -()+]+$/',
					'state_piece_vehicle_id' => 'required|regex:/[0-9 -()+]+$/'
				];
				
				return $rules;
			}
		}
	}
}
