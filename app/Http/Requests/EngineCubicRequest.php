<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class EngineCubicRequest extends Request
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * EngineCubicRequest constructor.
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
					'name' => 'required|max:30|unique_with:engine_cubics,acr,deleted_at',
					'acr'  => 'required|max:5'
				];
			}
			
			case 'PUT':
			{
				return [
					'name' => 'required|max:30|unique_with:engine_cubics,acr,' . $this->route->parameter('engine_cubic'),
					'acr'  => 'required|max:5'
				];
			}
		}
	}
}
