<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class PeriodicityRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;

	/**
	 * PeriodicityRequest constructor.
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
					'name'  => 'required|max:15|unique:periodicities'
				];
			}

			case 'PUT':
			{
				return [
					'name'  => 'required|max:15|unique:periodicities,name,' . $this->route->getParameter('periodicities')
				];
			}
		}
    }
}
