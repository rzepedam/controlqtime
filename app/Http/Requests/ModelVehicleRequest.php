<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class ModelVehicleRequest extends Request
{
    /**
     * @var Route
     */
    protected $route;

    /**
     * ModelVehicleRequest constructor.
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
                    'name'         => 'required|max:50|unique_with:model_vehicles,trademark_id,deleted_at',
                    'trademark_id' => 'required|regex:/[0-9 -()+]+$/',
                ];
            }

            case 'PUT':
            {
                return [
                    'name'         => 'required|max:50|unique_with:model_vehicles,trademark_id,'.$this->route->parameter('model_vehicle'),
                    'trademark_id' => 'required|regex:/[0-9 -()+]+$/',
                ];
            }
        }
    }
}
