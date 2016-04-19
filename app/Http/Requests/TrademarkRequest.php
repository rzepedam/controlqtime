<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;

/**
 * @property mixed route
 */
class TrademarkRequest extends SanitizedRequest
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
                    'name'  => 'required|max:50|unique:trademarks'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:50|unique:trademarks,name,' . $this->route->getParameter('trademarks')
                ];
            }
        }
    }
}
