<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TypeVehicleRequest;
use Controlqtime\Core\Contracts\WeightRepoInterface;
use Controlqtime\Core\Contracts\EngineCubicRepoInterface;
use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;

class TypeVehicleController extends Controller
{
    /**
     * @var EngineCubicRepoInterface
     */
    protected $engine_cubic;

    /**
     * @var TypeVehicleRepoInterface
     */
    protected $type_vehicle;

    /**
     * @var WeightRepoInterface
     */
    protected $weight;

    /**
     * TypeVehicleController constructor.
     * @param TypeVehicleRepoInterface $type_vehicle
     * @param WeightRepoInterface $weight
     * @param EngineCubicRepoInterface $engine_cubic
     */
    public function __construct(TypeVehicleRepoInterface $type_vehicle, WeightRepoInterface $weight, EngineCubicRepoInterface $engine_cubic)
    {
        $this->engine_cubic = $engine_cubic;
        $this->type_vehicle = $type_vehicle;
        $this->weight       = $weight;
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeVehicles()
    {
        $type_vehicles = $this->type_vehicle->all(['engineCubic', 'weight']);

        return $type_vehicles;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-vehicles.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $engine_cubics = $this->engine_cubic->lists('acr', 'id');
        $weights       = $this->weight->lists('acr', 'id');

        return view('maintainers.type-vehicles.create', compact('engine_cubics', 'weights'));
    }

    /**
     * @param TypeVehicleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeVehicleRequest $request)
    {
        $this->type_vehicle->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-vehicles'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $engine_cubics = $this->engine_cubic->lists('acr', 'id');
        $type_vehicle  = $this->type_vehicle->find($id);
        $weights       = $this->weight->lists('acr', 'id');

        return view('maintainers.type-vehicles.edit', compact(
            'engine_cubics', 'type_vehicle', 'weights'
        ));
    }

    /**
     * @param TypeVehicleRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeVehicleRequest $request, $id)
    {
        $this->type_vehicle->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-vehicles'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->type_vehicle->delete($id);

        return redirect()->route('type-vehicles.index');
    }

}
