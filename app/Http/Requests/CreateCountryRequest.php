<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCountryRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id'    => 'required',
            'name'  => 'required',
        ];
    }
}
