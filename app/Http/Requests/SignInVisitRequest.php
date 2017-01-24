<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInVisitRequest extends FormRequest
{
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
					'male_surname'   => ['required', 'max:30'],
					'female_surname' => ['required', 'max:30'],
					'first_name'     => ['required', 'max:30'],
					'second_name'    => ['max:30'],
					'rut'            => ['required', 'max:12'],
					'birthday'       => ['required', 'date_format:d-m-Y'],
					'is_male'        => ['required', 'in:M,F'],
					'phone'          => ['required', 'max:12'],
					'email'          => ['required', 'email', 'max:60']
				];
			}
		}
	}
}
