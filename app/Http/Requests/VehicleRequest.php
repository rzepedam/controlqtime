<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class VehicleRequest extends Request
{
    /**
     * @var Route
     */
    protected $route;

    /**
     * VehicleRequest constructor.
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
                $rules = [
                    'type_vehicle_id'       => 'required|regex:/[0-9 -()+]+$/',
                    'trademark_id'          => 'required|regex:/[0-9 -()+]+$/',
                    'model_vehicle_id'      => 'required|regex:/[0-9 -()+]+$/',
                    'company_id'            => 'required|regex:/[0-9 -()+]+$/',
                    'state_vehicle_id'      => 'required|regex:/[0-9 -()+]+$/',
                    'acquisition_date'      => 'required|date',
                    'inscription_date'      => 'required|date',
                    'color'                 => 'required|max:30',
                    'year'                  => 'required|max:4',
                    'fuel_id'               => 'required|regex:/[0-9 -()+]+$/',
                    'patent'                => 'required|max:15|unique:vehicles',
                    'num_chasis'            => 'required|max:17',
                    'num_motor'             => 'required|max:12',
                    'km'                    => 'required|max:7|regex:/[0-9 -()+]+$/',
                    'engine_cubic'          => 'required|max:4|regex:/[0-9 -()+]+$/',
                    'weight'                => 'required|max:6|regex:/[0-9 -()+]+$/',
                    'tag'                   => 'required|max:25',
                    'code'                  => 'required|max:20',
                    'emission_padron'       => 'required|date',
                    'expiration_padron'     => 'required|date',
                    'emission_insurance'    => 'required|date',
                    'expiration_insurance'  => 'required|date',
                    'emission_permission'   => 'required|date',
                    'expiration_permission' => 'required|date',
                ];

                if (Request::get('type_vehicle_id') == 2) {
                    $rules['carr'] = 'required|max:20';
                    $rules['num_plazas'] = 'required|max:3|regex:/[0-9 -()+]+$/';
                }

                return $rules;
            }

            case 'PUT':
            {
                $rules = [
                    'type_vehicle_id'       => 'required|regex:/[0-9 -()+]+$/',
                    'trademark_id'          => 'required|regex:/[0-9 -()+]+$/',
                    'model_vehicle_id'      => 'required|regex:/[0-9 -()+]+$/',
                    'company_id'            => 'required|regex:/[0-9 -()+]+$/',
                    'state_vehicle_id'      => 'required|regex:/[0-9 -()+]+$/',
                    'acquisition_date'      => 'required|date',
                    'inscription_date'      => 'required|date',
                    'color'                 => 'required|max:30',
                    'year'                  => 'required|max:4',
                    'fuel_id'               => 'required|regex:/[0-9 -()+]+$/',
                    'patent'                => 'required|max:15|unique:vehicles,patent,'.$this->route->parameter('vehicle'),
                    'num_chasis'            => 'required|max:17',
                    'num_motor'             => 'required|max:12',
                    'km'                    => 'required|max:7|regex:/[0-9 -()+]+$/',
                    'engine_cubic'          => 'required|max:4|regex:/[0-9 -()+]+$/',
                    'weight'                => 'required|regex:/[0-9 -()+]+$/',
                    'tag'                   => 'required|max:25',
                    'code'                  => 'required',
                    'emission_padron'       => 'required|date',
                    'expiration_padron'     => 'required|date',
                    'emission_insurance'    => 'required|date',
                    'expiration_insurance'  => 'required|date',
                    'emission_permission'   => 'required|date',
                    'expiration_permission' => 'required|date',
                ];

                if (Request::get('type_vehicle_id') == 2) {
                    $rules['carr'] = 'required|max:20';
                    $rules['num_plazas'] = 'required|max:3|regex:/[0-9 -()+]+$/';
                }

                return $rules;
            }
        }
    }
}
