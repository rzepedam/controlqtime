<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class ContractRequest extends SanitizedRequest
{
	/**
	 * @var Route
	 */
	protected $route;

	/**
	 * ContractRequest constructor.
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
		switch($this->method())
		{
			case 'POST':
			{
				return [
					'company_id'			=> 'required|regex:/[0-9 -()+]+$/',
					'employee_id'  			=> 'required|regex:/[0-9 -()+]+$/',
					'position_id'  			=> 'required|regex:/[0-9 -()+]+$/',
					'num_hour_id'			=> 'required|regex:/[0-9 -()+]+$/',
					'periodicity_hour_id'	=> 'required|regex:/[0-9 -()+]+$/',
					'day_trip_id'			=> 'required|regex:/[0-9 -()+]+$/',
					'init_morning'			=> '',
					'end_morning'			=> '',
					'init_afternoon'		=> '',
					'end_afternoon'			=> '',
					'periodicity_work_id'	=> 'required|regex:/[0-9 -()+]+$/',
					'salary'				=> '',
					'mobilization'			=> '',
					'collation'				=> '',
					'gratification_id'		=> 'required|regex:/[0-9 -()+]+$/',
					'type_contract_id'		=> 'required|regex:/[0-9 -()+]+$/',
					'pension_id'			=> 'required|regex:/[0-9 -()+]+$/',
					'forecast_id'			=> 'required|regex:/[0-9 -()+]+$/',
				];
			}

			case 'PUT':
			{
				dd('PUT...');
				return [
					'name'  => 'required|max:50|unique:contracts,name,' . $this->route->getParameter('contracts')
				];
			}
		}
    }
}
