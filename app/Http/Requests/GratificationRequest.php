<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class GratificationRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;

	/**
	 * GratificationRequest constructor.
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
					'name'  => 'required|unique:gratifications'
				];
			}

			case 'PUT':
			{
				return [
					'name'  => 'required|unique:gratifications,name,' . $this->route->getParameter('gratifications')
				];
			}
		}
    }
}
