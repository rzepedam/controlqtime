<?php

namespace Controlqtime\Http\Requests;

use Controlqtime\Http\Requests\Forms\SanitizedRequest;
use Controlqtime\Http\Requests\Request;
use Illuminate\Routing\Route;


/**
 * @property mixed route
 */
class TerminalRequest extends SanitizedRequest
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
                    'name'  => 'required|max:75|unique:terminals'
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:75|unique:terminals,name,' . $this->route->getParameter('terminals')
                ];
            }
        }
    }
}
