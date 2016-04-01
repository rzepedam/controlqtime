<?php

namespace App\Http\Requests;

use App\Http\Requests\Forms\SanitizedRequest;
use Illuminate\Routing\Route;

/**
 * @property Route route
 */
class ProfessionalLicenseRequest extends SanitizedRequest
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
                    'name'  => 'required|max:50|unique:professional_licenses',
                ];
            }

            case 'PUT':
            {
                return [

                    'name'  => 'required|max:50|unique:professional_licenses,name,' . $this->route->getParameter('professional_licenses')
                ];
            }
        }
    }
}
