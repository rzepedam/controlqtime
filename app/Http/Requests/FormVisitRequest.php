<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormVisitRequest extends FormRequest
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
                    'address' => ['required'], 
                    'city' => ['required'], 
                    'phone' => ['required']
                ];
            }

            case 'PUT':
            {
                return [
                    'address' => ['required'], 
                    'city' => ['required'], 
                    'phone' => ['required']
                ];
            }
        }
    }
}
