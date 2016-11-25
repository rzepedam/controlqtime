<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;
use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class MutualityRequest extends SanitizedRequest
{
	protected $route;
	
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
		switch ($this->method())
		{
			case 'POST':
			{
				return [
					'name' => 'required|max:75|unique:mutualities,name,NULL,id,deleted_at,NULL'
				];
			}
			
			case 'PUT':
			{
				return [
					'name' => 'required|max:75|unique:mutualities,name,' . $this->route->getParameter('mutuality')
				];
			}
		}
	}
}
