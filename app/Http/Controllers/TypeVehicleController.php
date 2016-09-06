<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\EngineCubicRepoInterface;
use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Core\Contracts\WeightRepoInterface;
use Controlqtime\Http\Requests\TypeVehicleRequest;
use Controlqtime\Http\Requests;

class TypeVehicleController extends Controller {

	protected $engine_cubic;
	protected $type_vehicle;
	protected $weight;

	public function __construct(TypeVehicleRepoInterface $type_vehicle, WeightRepoInterface $weight, EngineCubicRepoInterface $engine_cubic)
	{
		$this->engine_cubic = $engine_cubic;
		$this->type_vehicle = $type_vehicle;
		$this->weight       = $weight;
	}

	public function index()
	{
		return view('maintainers.type-vehicles.index');
	}

	public function getTypeVehicles()
	{
		$type_vehicles = $this->type_vehicle->all(['engineCubic', 'weight']);
		return $type_vehicles;
	}

	public function create()
	{
		$engine_cubics = $this->engine_cubic->lists('acr', 'id');
		$weights       = $this->weight->lists('acr', 'id');

		return view('maintainers.type-vehicles.create', compact('engine_cubics', 'weights'));
	}

	public function store(TypeVehicleRequest $request)
	{
		$this->type_vehicle->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-vehicles'
		));
	}

	public function edit($id)
	{
		$engine_cubics = $this->engine_cubic->lists('acr', 'id');
		$type_vehicle  = $this->type_vehicle->find($id);
		$weights       = $this->weight->lists('acr', 'id');

		return view('maintainers.type-vehicles.edit', compact(
			'engine_cubics', 'type_vehicle', 'weights'
		));
	}

	public function update(TypeVehicleRequest $request, $id)
	{
		$this->type_vehicle->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-vehicles'
		));
	}

	public function destroy($id)
	{
		$this->type_vehicle->delete($id);

		return redirect()->route('type-vehicles.index');
	}

}
