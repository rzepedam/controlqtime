<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Http\Requests\MasterPieceVehicleRequest;
use Controlqtime\Core\Contracts\MasterPieceVehicleRepoInterface;

class MasterPieceVehicleController extends Controller
{
	/**
	 * @var MasterPieceVehicleRepoInterface
	 */
	protected $master_piece_vehicle;

	/**
	 * MasterPieceVehicleController constructor.
	 *
	 * @param MasterPieceVehicleRepoInterface $master_piece_vehicle
	 */
	public function __construct(MasterPieceVehicleRepoInterface $master_piece_vehicle)
	{
		$this->master_piece_vehicle = $master_piece_vehicle;
	}

	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getMasterPieceVehicles()
	{
		$masterPiecesVehicles = $this->master_piece_vehicle->all();

		return $masterPiecesVehicles;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('maintainers.master-piece-vehicles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintainers.master-piece-vehicles.create');
    }


    public function store(MasterPieceVehicleRequest $request)
    {
		$this->master_piece_vehicle->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/master-piece-vehicles'
		));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masterPieceVehicle = $this->master_piece_vehicle->find($id);

		return view('maintainers.master-piece-vehicles.edit', compact('masterPieceVehicle'));
    }

	/**
	 * @param MasterPieceVehicleRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(MasterPieceVehicleRequest $request, $id)
    {
		$this->master_piece_vehicle->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/master-piece-vehicles'
		));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$this->master_piece_vehicle->delete($id);

		return redirect()->route('master-piece-vehicles.index');
    }
}
