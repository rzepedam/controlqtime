<?php

namespace Controlqtime\Http\Requests;

use Illuminate\Routing\Route;

class AreaRequest extends Request
{
    /**
     * @var Route
     */
    protected $route;

    /**
     * AreaRequest constructor.
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
                    'name'        => 'required|max:50|unique_with:areas,terminal_id,deleted_at',
                    'terminal_id' => 'required|regex:/[0-9 -()+]+$/',
                ];
            }

            case 'PUT':
            {
                return [
                    'name'        => 'required|max:50|unique_with:areas,terminal_id,'.$this->route->parameter('area'),
                    'terminal_id' => 'required|regex:/[0-9 -()+]+$/',
                ];
            }
        }
    }
}
