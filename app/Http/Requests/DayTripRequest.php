<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class DayTripRequest extends Request
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * DayTripRequest constructor.
	 *
	 * @param Route $route
	 */
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
		switch ( $this->method() )
		{
			case 'POST':
			{
				return [
					'name' => 'required|max:50|unique:day_trips,name,NULL,id,deleted_at,NULL'
				];
			}
			
			case 'PUT':
			{
				return [
					'name' => 'required|max:50|unique:day_trips,name,' . $this->route->parameter('day_trip')
				];
			}
		}
	}
}
