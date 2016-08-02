<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class EngineCubicRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;

	/**
	 * EngineCubicRequest constructor.
	 * @param Route $route
	 */
	public function __construct(Route $route)
    {
        $this->route = $route;
    }

	/**
	 * @return bool
	 */
	public function authorize()
    {
        return true;
    }

	/**
	 * @return array
	 */
	public function rules()
    {
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'name'  => 'required|max:30|unique_with:engine_cubics,acr',
                    'acr'   => 'required|max:5'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:30|unique_with:engine_cubics,acr,' . $this->route->getParameter('engine_cubics'),
                    'acr'   => 'required|max:5'
                ];
            }
        }
    }
}
