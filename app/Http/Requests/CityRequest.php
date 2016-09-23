<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class CityRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;

	/**
	 * CityRequest constructor.
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
                    'name'          => 'required|max:50|unique_with:cities,country_id',
                    'country_id'    => 'required|regex:/[0-9 -()+]+$/'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'          => 'required|max:50|unique_with:cities,country_id,' . $this->route->getParameter('city'),
                    'country_id'    => 'required|regex:/[0-9 -()+]+$/'
                ];
            }
        }
    }
}
