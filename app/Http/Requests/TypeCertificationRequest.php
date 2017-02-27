<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class TypeCertificationRequest extends Request
{
    /**
     * @var Route
     */
    private $route;

    /**
     * TypeCertificationRequest constructor.
     *
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name' => 'required|max:100|unique:type_certifications,name,NULL,id,deleted_at,NULL',
                ];
            }

            case 'PUT':
            {
                return [
                    'name' => 'required|max:100|unique:type_certifications,name,'.$this->route->parameter('type_certification'),
                ];
            }
        }
    }
}
