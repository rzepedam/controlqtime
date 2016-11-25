<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class WeightRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * WeightRequest constructor.
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
					'name' => 'required|max:30|unique_with:weights,acr',
					'acr'  => 'required|max:5|unique:weights'
				];
			}
			
			case 'PUT':
			{
				return [
					'name' => 'required|max:30|unique_with:weights,acr,' . $this->route->getParameter('weight'),
					'acr'  => 'required|max:5'
				];
			}
		}
	}
}
