<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\StatePieceVehicleRequest;
use Controlqtime\Core\Contracts\StatePieceVehicleRepoInterface;

class StatePieceVehicleController extends Controller
{
    /**
     * @var StatePieceVehicleRepoInterface
     */
    protected $state_piece_vehicle;

    /**
     * StatePieceController constructor.
     *
     * @param StatePieceVehicleRepoInterface $state_piece_vehicle
     */
    public function __construct(StatePieceVehicleRepoInterface $state_piece_vehicle)
    {
        $this->state_piece_vehicle = $state_piece_vehicle;
    }

    /**
     * @return mixed for Bootstrap Table
     */
    public function getStatePieceVehicles()
    {
        $statePieceVehicles = $this->state_piece_vehicle->all();

        return $statePieceVehicles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('maintainers.state-piece-vehicles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintainers.state-piece-vehicles.create');
    }

    /**
     * @param StatePieceVehicleRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StatePieceVehicleRequest $request)
    {
        $this->state_piece_vehicle->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/state-piece-vehicles'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statePieceVehicle = $this->state_piece_vehicle->find($id);

        return view('maintainers.state-piece-vehicles.edit', compact('statePieceVehicle'));
    }

    /**
     * @param StatePieceVehicleRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StatePieceVehicleRequest $request, $id)
    {
        $this->state_piece_vehicle->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/state-piece-vehicles'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->state_piece_vehicle->delete($id);

        return redirect()->route('state-piece-vehicles.index');
    }
}
