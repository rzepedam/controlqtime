<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Http\Requests\TypeVehicleRequest;
use Controlqtime\Http\Requests;

class TypeVehicleController extends Controller
{
    protected $type_vehicle;

    public function __construct(TypeVehicleRepoInterface $type_vehicle)
    {
        $this->type_vehicle = $type_vehicle;
    }

    public function index()
    {
        $type_vehicles = $this->type_vehicle->all();
        return view('maintainers.type-vehicles.index', compact('type_vehicles'));
    }
    
    public function create()
    {
        return view('maintainers.type-vehicles.create');
    }

    public function store(TypeVehicleRequest $request)
    {
        $this->type_vehicle->create($request->all());
        return redirect()->route('maintainers.type-vehicles.index');
    }

    public function edit($id)
    {
        $type_vehicle = $this->type_vehicle->find($id);
        return view('maintainers.type-vehicles.edit', compact('type_vehicle'));
    }

    public function update(TypeVehicleRequest $request, $id)
    {
        $this->type_vehicle->update($request->all(), $id);
        return redirect()->route('maintainers.type-vehicles.index');
    }

    public function destroy($id)
    {
        $this->type_vehicle->delete($id);
        return redirect()->route('maintainers.type-vehicles.index');
    }

}
