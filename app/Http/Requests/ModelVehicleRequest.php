<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class ModelVehicleRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;

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
					'name'  		=> 'required|max:50|unique_with:model_vehicles,trademark_id',
					'trademark_id' 	=> 'required|regex:/[0-9 -()+]+$/'
				];
			}

			case 'PUT':
			{
				return [
					'name'  		=> 'required|max:50|unique_with:model_vehicles,trademark_id,' . $this->route->getParameter('model_vehicle'),
					'trademark_id' 	=> 'required|regex:/[0-9 -()+]+$/'
				];
			}
		}
    }
}
