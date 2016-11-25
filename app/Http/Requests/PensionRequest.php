<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Request;
use Illuminate\Routing\Route;
use Controlqtime\Http\Requests\Forms\SanitizedRequest;

class PensionRequest extends SanitizedRequest
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'name'  => 'required|max:75|unique:pensions,name,NULL,id,deleted_at,NULL'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:75|unique:pensions,name,' . $this->route->getParameter('pension')
                ];
            }
        }
    }
}
