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
				if ( Request::get('name') == 'Plazo Fijo' )
				{
					$rules = [
						'name' => 'required|unique_with:type_contracts,dur,deleted_at',
						'dur'  => 'required|not_in:0|max:2'
					];
				} else
				{
					$rules = [
						'name' => 'required|unique:type_contracts'
					];
				}
				
				return $rules;
			}
			
			case 'PUT':
			{
				if ( Request::get('name') == 'Plazo Fijo' )
				{
					$rules = [
						'name' => 'required|unique_with:type_contracts,dur,' . $this->route->getParameter('type_contract'),
						'dur'  => 'required|not_in:0|max:2'
					];
				} else
				{
					$rules = [
						'name' => 'required|unique:type_contracts',
						'dur'  => 'required|in:0'
					];
				}
				
				return $rules;
			}
		}
	}
}
