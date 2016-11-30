<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;
use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class CityRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * CityRequest constructor.
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
					'name'       => 'required|max:50|unique_with:cities,country_id,deleted_at',
					'country_id' => 'required|regex:/[0-9 -()+]+$/'
				];
			}
			
			case 'PUT':
			{
				return [
					'name'       => 'required|max:50|unique_with:cities,country_id,' . $this->route->getParameter('city'),
					'country_id' => 'required|regex:/[0-9 -()+]+$/'
				];
			}
		}
	}
}
