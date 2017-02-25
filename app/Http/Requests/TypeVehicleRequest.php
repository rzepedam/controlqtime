<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class TypeVehicleRequest extends Request
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * TypeVehicleRequest constructor.
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
		switch ( $this->method() )
		{
			case 'POST':
			{
				return [
					'name'            => 'required|max:50|unique:type_vehicles,name,NULL,id,deleted_at,NULL',
					'weight_id'       => 'required|regex:/[0-9 -()+]+$/',
					'engine_cubic_id' => 'required|regex:/[0-9 -()+]+$/'
				];
			}
			
			case 'PUT':
			{
				return [
					'name'            => 'required|max:50|unique:type_vehicles,name,' . $this->route->parameter('type_vehicle'),
					'weight_id'       => 'required|regex:/[0-9 -()+]+$/',
					'engine_cubic_id' => 'required|regex:/[0-9 -()+]+$/'
				];
			}
		}
	}
}
