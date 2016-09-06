<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class AreaRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;

	/**
	 * AreaRequest constructor.
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
					'name'  		=> 'required|max:50|unique_with:areas,terminal_id',
					'terminal_id' 	=> 'required|regex:/[0-9 -()+]+$/'
                ];
            }

            case 'PUT':
            {
                return [
					'name'  		=> 'required|max:50|unique_with:areas,terminal_id,' . $this->route->getParameter('area'),
					'terminal_id' 	=> 'required|regex:/[0-9 -()+]+$/'
                ];
            }
        }
    }
}
