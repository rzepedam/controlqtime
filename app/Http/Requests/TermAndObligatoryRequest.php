<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class TermAndObligatoryRequest extends Request
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * TermAndObligatoryRequest constructor.
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
					'name' => 'required|unique:term_and_obligatories,name,NULL,id,deleted_at,NULL'
				];
			}
			
			case 'PUT':
			{
				return [
					'name' => 'required|unique:term_and_obligatories,name,' . $this->route->parameter('terms_and_obligatory')
				];
			}
		}
	}
}
