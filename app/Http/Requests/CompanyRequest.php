<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class CompanyRequest extends Request
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * CompanyRequest constructor.
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
				$rules = [
					'type_company_id'       => 'required|regex:/[0-9 -()+]+$/',
					'rut'                   => 'required|unique:companies,rut|max:15',
					'firm_name'             => 'required',
					'gyre'                  => 'required',
					'start_act'             => 'required|date',
					'address'               => 'required',
					'commune_id'            => 'required|regex:/[0-9 -()+]+$/',
					'lot'                   => 'max:5',
					'bod'                   => 'max:5',
					'ofi'                   => 'max:5',
					'floor'                 => 'regex:/[0-9 -()+]+$/|digits_between:1,3',
					'muni_license'          => 'required|max:50',
					'phone1'                => 'required|max:20',
					'phone2'                => 'max:20',
					'email_company'         => 'required|email|unique:companies,email_company|max:60',
					'male_surname'          => 'required|max:30',
					'female_surname'        => 'required|max:30',
					'first_name'            => 'required|max:30',
					'second_name'           => 'max:30',
					'rut_representative'    => 'required|max:15|unique:legal_representatives,rut_representative',
					'birthday'              => 'required|date',
					'nationality_id'        => 'required|regex:/[0-9 -()+]+$/',
					'phone1_representative' => 'required|max:20',
					'phone2_representative' => 'max:20',
					'email_representative'  => 'required|max:60|email|unique:legal_representatives,email_representative',
				];
				
				return $rules;
			}
			
			case 'PUT':
			{
				$rules = [
					'type_company_id'       => 'required|regex:/[0-9 -()+]+$/',
					'rut'                   => 'required|max:15|unique:companies,rut,' . $this->route->parameter('company'),
					'firm_name'             => 'required',
					'gyre'                  => 'required',
					'start_act'             => ['required', 'date_format:d-m-Y'],
					'address'               => 'required',
					'commune_id'            => 'required|integer',
					'lot'                   => 'max:20',
					'bod'                   => 'max:5',
					'ofi'                   => 'max:5',
					'floor'                 => 'max:3',
					'muni_license'          => 'required|max:50',
					'phone1'                => 'required|max:20',
					'phone2'                => 'max:20',
					'email_company'         => 'required|email|max:60|unique:companies,email_company,' . $this->route->parameter('company'),
					'male_surname'          => 'required|max:30',
					'female_surname'        => 'required|max:30',
					'first_name'            => 'required|max:30',
					'second_name'           => 'max:30',
					'rut_representative'    => 'required|max:15|unique:legal_representatives,rut_representative,' . $this->route->parameter('company'),
					'birthday'              => 'required|date',
					'nationality_id'        => 'required|regex:/[0-9 -()+]+$/',
					'phone1_representative' => 'required|max:20',
					'phone2_representative' => 'max:20',
					'email_representative'  => 'required|max:60|email|unique:legal_representatives,email_representative,' . $this->route->parameter('company')
				];
				
				return $rules;
			}
		}
	}
}
