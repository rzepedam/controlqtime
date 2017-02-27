<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Entities\MasterFormPieceVehicle;
use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Http\Requests\MasterFormPieceVehicleRequest;
use Exception;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;

class MasterFormPieceVehicleController extends Controller
{
    /**
     * @var Log
     */
    protected $log;

    /**
     * @var MasterFormPieceVehicle
     */
    protected $masterFormPieceVehicle;

    /**
     * @var PieceVehicle
     */
    protected $pieceVehicle;

    /**
     * MasterFormPieceVehicleController constructor.
     *
     * @param Log                    $log
     * @param MasterFormPieceVehicle $masterFormPieceVehicle
     * @param PieceVehicle           $pieceVehicle
     */
    public function __construct(Log $log, MasterFormPieceVehicle $masterFormPieceVehicle, PieceVehicle $pieceVehicle)
    {
        $this->log = $log;
        $this->masterFormPieceVehicle = $masterFormPieceVehicle;
        $this->pieceVehicle = $pieceVehicle;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('operations.master-form-piece-vehicles.index');
    }

    /**
     * @return mixed for Bootstrap Table
     */
    public function getMasterFormPieceVehicles()
    {
        $masterFormPieceVehicles = $this->masterFormPieceVehicle->all();

        return $masterFormPieceVehicles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pieceVehicles = $this->pieceVehicle->all();

        return view('operations.master-form-piece-vehicles.create', compact('pieceVehicles'));
    }

    /**
     * @param \Controlqtime\Http\Requests\MasterFormPieceVehicleRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MasterFormPieceVehicleRequest $request)
    {
        DB::beginTransaction();

        try {
            $masterFormPieceVehicle = $this->masterFormPieceVehicle->create($request->all());
            $masterFormPieceVehicle->pieceVehicles()->attach($request->get('piece_id'));
            session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
            DB::commit();

            return response()->json(['status' => true, 'url' => '/operations/master-form-piece-vehicles']);
        } catch (Exception $e) {
            $this->log->error('Error Store MasterFormPieceVehicle: '.$e->getMessage());
            DB::rollback();

            return response()->json(['status' => false]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masterFormPieceVehicle = $this->masterFormPieceVehicle->with(['pieceVehicles'])->findOrFail($id);
        $pieceVehicles = $this->pieceVehicle->all();

        return view('operations.master-form-piece-vehicles.edit', compact(
            'masterFormPieceVehicle', 'pieceVehicles'
        ));
    }

    /**
     * @param \Controlqtime\Http\Requests\MasterFormPieceVehicleRequest $request
     * @param                                                           $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MasterFormPieceVehicleRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $masterFormPieceVehicle = $this->masterFormPieceVehicle->findOrFail($id);
            $masterFormPieceVehicle->fill($request->all())->saveOrFail();
            $masterFormPieceVehicle->pieceVehicles()->sync($request->get('piece_id'));
            DB::commit();

            return response()->json(['status' => true, 'url' => '/operations/master-form-piece-vehicles']);
        } catch (Exception $e) {
            $this->log->error('Error Update MasterFormPieceVehicle: '.$e->getMessage());
            DB::rollback();

            return response()->json(['status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->masterFormPieceVehicle->destroy($id);

        return redirect()->route('master-form-piece-vehicles.index');
    }
}
