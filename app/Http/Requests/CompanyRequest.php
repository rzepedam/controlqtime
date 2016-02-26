<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompanyRequest extends Request
{

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

    }
}
