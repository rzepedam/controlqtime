<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use App\Http\Requests\Request;

class ModelVehicleRequest extends SanitizedRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            //
        ];
    }
}
