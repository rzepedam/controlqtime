<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class MasterFormPieceVehicleRequest extends Request
{
	/**
	 * @var \Illuminate\Routing\Route
	 */
	protected $route;
	
	/**
	 * MasterFormPieceVehicleRequest constructor.
	 *
	 * @param \Illuminate\Routing\Route $route
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
					'name' => 'required|max:50|unique:master_form_piece_vehicles'
				];
			}
			
			case 'PUT':
			{
				return [
					'name' => 'required|max:50|unique:master_form_piece_vehicles,name,' . $this->route->parameter
						('master_form_piece_vehicle')
				];
			}
		}
	}
}
