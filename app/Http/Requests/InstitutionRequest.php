<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class InstitutionRequest extends Request
{
    /**
     * @var Route
     */
    protected $route;

    /**
     * InstitutionRequest constructor.
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
                    'name'                => 'required|max:75|unique_with:institutions,type_institution_id,deleted_at',
                    'type_institution_id' => 'required|regex:/[0-9 -()+]+$/',
                ];
            }

            case 'PUT':
            {
                return [
                    'name'                => 'required|max:75|unique_with:institutions,type_institution_id,'.$this->route->parameter('institution'),
                    'type_institution_id' => 'required|regex:/[0-9 -()+]+$/',
                ];
            }
        }
    }
}
