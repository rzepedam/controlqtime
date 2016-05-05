<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\ModelVehicleRepoInterface;
use Controlqtime\Core\Contracts\TerminalRepoInterface;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;
use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Http\Requests\VehicleRequest;
use Controlqtime\Http\Requests;

class VehicleController extends Controller
{
    protected $company;
    protected $model_vehicle;
    protected $terminal;
    protected $type_vehicle;
    protected $vehicle;
    protected $trademark;

    public function __construct(VehicleRepoInterface $vehicle, TypeVehicleRepoInterface $type_vehicle, TrademarkRepoInterface $trademark, ModelVehicleRepoInterface $model_vehicle, TerminalRepoInterface $terminal, Company $company)
    {
        $this->company          = $company;
        $this->model_vehicle    = $model_vehicle;
        $this->terminal         = $terminal;
        $this->trademark        = $trademark;
        $this->type_vehicle     = $type_vehicle;
        $this->vehicle          = $vehicle;
    }

    public function index()
    {
        $vehicles = $this->vehicle->all(['typeVehicle', 'modelVehicle', 'terminal']);
        return view('maintainers.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $model_vehicles     = $this->model_vehicle->lists('name', 'id');
        $terminals          = $this->terminal->lists('name', 'id');
        $trademarks         = $this->trademark->lists('name', 'id');
        $type_vehicles      = $this->type_vehicle->lists('name', 'id');

        return view('maintainers.vehicles.create', compact(
            'type_vehicles', 'trademarks', 'model_vehicles', 'terminals'
        ));
    }

    public function store(VehicleRequest $request)
    {
        $this->vehicle->create($request->all());
        return redirect()->route('maintainers.vehicles.index');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $type_vehicles = TypeVehicle::lists('name', 'id');
        $tempTrade = ModelVehicle::where('id', $vehicle->model_vehicle_id)->first();
        $trademarks = Trademark::lists('name', 'id');
        $model_vehicles = Trademark::find($tempTrade->trademark_id)->modelVehicles->lists('name', 'id');
        $terminals = Terminal::lists('name', 'id');

        return view('maintainers.vehicles.edit', compact(
            'vehicle', 'type_vehicles', 'trademarks', 'model_vehicles', 'terminals'
        ));
    }

    public function update(VehicleRequest $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $message = 'El registro ' . $vehicle->name . ' fue actualizado satisfactoriamente.';
        $vehicle->fill($request->all());
        $vehicle->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.vehicles.index');
    }

    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('maintainers.vehicles.show', compact('vehicle'));
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        Session::flash('success', 'El registro ' . $vehicle->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.vehicles.index');
    }
}
