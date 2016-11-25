<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class TerminalRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * TerminalRequest constructor.
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
					'name'       => 'required|max:50|unique:terminals,name,NULL,id,deleted_at,NULL',
					'commune_id' => 'required|regex:/[0-9 -()+]+$/'
				];
			}
			
			case 'PUT':
			{
				return [
					'name'       => 'required|max:75|unique:terminals,name,' . $this->route->getParameter('terminal'),
					'commune_id' => 'required|regex:/[0-9 -()+]+$/'
				];
			}
		}
	}
}
