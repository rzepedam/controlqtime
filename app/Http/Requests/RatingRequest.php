<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

class RatingRequest extends SanitizedRequest
{
    /**
     * RatingRequest constructor.
     */
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
                    'name'  => 'required|max:50|unique:ratings',
                ];
            }

            case 'PUT':
            {
                return [
                    'name'  => 'required|max:50|unique:ratings,name,' . $this->route->getParameter('ratings')
                ];
            }
        }
    }
}
