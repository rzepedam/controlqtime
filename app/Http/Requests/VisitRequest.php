<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class VisitRequest extends Request
{
    /**
     * @var Route
     */
    protected $route;

    /**
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
                    'type_visit_id'  => ['required', 'exists:type_visits,id'],
                    'employee_id'    => ['required', 'exists:employees,id'], 
                    'is_walking'     => ['required', 'in:0,1'], 
                    'rut'            => ['required'], 
                    'male_surname'   => ['required'], 
                    'female_surname' => ['required'],
                    'first_name'     => ['required'], 
                    'position'       => ['required'],
                    'company'        => ['required'], 
                    'phone'          => ['required'], 
                    'email'          => ['required', 'email'], 
                    'date'           => ['required'], 
                    'hour'           => ['required']
                ];
            }

            case 'PUT':
            {
                return [
                    //
                ];
            }
        }
    }
}
