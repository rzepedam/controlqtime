<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class NumHourRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;

	/**
	 * NumHourRequest constructor.
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
		switch($this->method())
		{
			case 'POST':
			{
				return [
					'name'  => 'required|max:3|unique:num_hours|regex:/[0-9 -()+]+$/'
				];
			}

			case 'PUT':
			{
				return [
					'name'  => 'required|max:3|regex:/[0-9 -()+]+$/|unique:num_hours,name,' . $this->route->getParameter('num_hours')
				];
			}
		}
    }
}
