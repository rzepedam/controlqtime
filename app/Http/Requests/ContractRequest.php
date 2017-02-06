<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;
use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class ContractRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * ContractRequest constructor.
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
					'company_id'       => 'required|regex:/[0-9 -()+]+$/',
					'employee_id'      => 'required|regex:/[0-9 -()+]+$/',
					'start_contract'   => ['required', 'date_format:d-m-Y'],
					'position_id'      => 'required|regex:/[0-9 -()+]+$/',
					'area_id'          => 'required|regex:/[0-9 -()+]+$/',
					'type_contract_id' => 'required|regex:/[0-9 -()+]+$/',
					'num_hour'         => 'required|integer|between:1,45',
					'day_trip_id'      => 'required|regex:/[0-9 -()+]+$/',
					'init_morning'     => 'required|max:5',
					'end_morning'      => 'required|max:5',
					'init_afternoon'   => 'required|max:5',
					'end_afternoon'    => 'required|max:5',
					'salary'           => 'required|max:8',
					'mobilization'     => 'required|max:8',
					'collation'        => 'required|max:8',
					'forecast_id'      => 'required|regex:/[0-9 -()+]+$/',
					'pension_id'       => 'required|regex:/[0-9 -()+]+$/'
				];
			}
		}
	}
}
