<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class TypeContractRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;

	/**
	 * TypeContractRequest constructor.
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
					'name'  => 'required|max:30|unique:type_contracts'
				];
			}

			case 'PUT':
			{
				return [
					'name'  => 'required|max:30|unique:type_contracts,name,' . $this->route->getParameter('type_contracts')
				];
			}
		}
    }
}
