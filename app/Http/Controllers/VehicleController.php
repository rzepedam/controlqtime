<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\DateDocumentationVehicleRepoInterface;
use Controlqtime\Core\Contracts\DetailVehicleRepoInterface;
use Illuminate\Http\Request;
use Controlqtime\Core\Contracts\FuelRepoInterface;
use Controlqtime\Core\Contracts\ImageFactoryInterface;
use Controlqtime\Core\Contracts\StateVehicleRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\ModelVehicleRepoInterface;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;
use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Http\Requests\VehicleRequest;
use Illuminate\Support\Facades\DB;


class VehicleController extends Controller
{
	/**
	 * @var CompanyRepoInterface
	 */
	protected $company;
	/**
	 * @var FuelRepoInterface
	 */
	protected $fuel;
	/**
	 * @var ImageFactoryInterface
	 */
	protected $image;
	/**
	 * @var ModelVehicleRepoInterface
	 */
	protected $model_vehicle;
	/**
	 * @var TrademarkRepoInterface
	 */
	protected $trademark;
	/**
	 * @var TypeVehicleRepoInterface
	 */
	protected $type_vehicle;
	/**
	 * @var StateVehicleRepoInterface
	 */
	protected $state_vehicle;
	/**
	 * @var VehicleRepoInterface
	 */
	protected $vehicle;
	/**
	 * @var DetailVehicleRepoInterface
	 */
	protected $detailVehicle;
	/**
	 * @var DateDocumentationVehicleRepoInterface
	 */
	protected $dateDocumentationVehicle;

	/**
	 * VehicleController constructor.
	 *
	 * @param VehicleRepoInterface $vehicle
	 * @param TypeVehicleRepoInterface $type_vehicle
	 * @param TrademarkRepoInterface $trademark
	 * @param ModelVehicleRepoInterface $model_vehicle
	 * @param CompanyRepoInterface $company
	 * @param FuelRepoInterface $fuel
	 * @param StateVehicleRepoInterface $state_vehicle
	 * @param ImageFactoryInterface $image
	 * @param DetailVehicleRepoInterface $detailVehicle
	 * @param DateDocumentationVehicleRepoInterface $dateDocumentationVehicle
	 */
	public function __construct(VehicleRepoInterface $vehicle, TypeVehicleRepoInterface $type_vehicle, TrademarkRepoInterface $trademark, ModelVehicleRepoInterface $model_vehicle, CompanyRepoInterface $company, FuelRepoInterface $fuel, StateVehicleRepoInterface $state_vehicle, ImageFactoryInterface $image, DetailVehicleRepoInterface $detailVehicle, DateDocumentationVehicleRepoInterface $dateDocumentationVehicle)
	{
		$this->company                  = $company;
		$this->detailVehicle            = $detailVehicle;
		$this->fuel                     = $fuel;
		$this->image                    = $image;
		$this->model_vehicle            = $model_vehicle;
		$this->trademark                = $trademark;
		$this->type_vehicle             = $type_vehicle;
		$this->state_vehicle            = $state_vehicle;
		$this->vehicle                  = $vehicle;
		$this->dateDocumentationVehicle = $dateDocumentationVehicle;
	}

	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getVehicles()
	{
		$vehicles = $this->vehicle->all(['typeVehicle', 'modelVehicle']);

		return $vehicles;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('operations.vehicles.index', compact('vehicles'));
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$fuels          = $this->fuel->lists('name', 'id');
		$model_vehicles = $this->model_vehicle->lists('name', 'id');
		$trademarks     = $this->trademark->lists('name', 'id');
		$type_vehicles  = $this->type_vehicle->lists('name', 'id');
		$companies      = $this->company->whereLists('state', 'enable', 'firm_name');
		$state_vehicles = $this->state_vehicle->lists('name', 'id');

		return view('operations.vehicles.create', compact('trademarks', 'model_vehicles', 'type_vehicles', 'fuels', 'companies', 'state_vehicles'));
	}

	/**
	 * @param VehicleRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(VehicleRequest $request)
	{
		DB::beginTransaction();

		try {
			$vehicle = $this->vehicle->create($request->all());
			$vehicle->detailVehicle()->create($request->all());
			$vehicle->dateDocumentationVehicle()->create($request->all());

		    DB::commit();
		}catch( Exception $e) {
		    DB::rollback();
		}

		return response()->json([
			'success' => true,
			'url' => '/operations/vehicles'
		]);

	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$vehicle        = $this->vehicle->find($id, ['modelVehicle.trademark']);
		$trademarks     = $this->trademark->lists('name', 'id');
		$model_vehicles = $this->trademark->findModelVehicles($vehicle->modelVehicle->trademark->id);
		$type_vehicles  = $this->type_vehicle->lists('name', 'id');
		$companies      = $this->company->whereLists('state', 'enable', 'firm_name');
		$fuels          = $this->fuel->lists('name', 'id');
		$state_vehicles = $this->state_vehicle->lists('name', 'id');

		return view('operations.vehicles.edit', compact(
			'vehicle', 'type_vehicles', 'trademarks', 'model_vehicles', 'companies', 'fuels', 'state_vehicles'
		));
	}

	/**
	 * @param VehicleRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(VehicleRequest $request, $id)
	{
		DB::beginTransaction();

		try {
			$vehicle = $this->vehicle->update($request->all(), $id);
			$this->detailVehicle->update($request->all(), $vehicle->detailVehicle->id);
			$this->dateDocumentationVehicle->update($request->all(), $vehicle->dateDocumentationVehicle->id);

		    DB::commit();
		}catch( Exception $e) {
			DB::rollback();
		}

		return response()->json(['success' => true, 'url' => '/operations/vehicles']);
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$vehicle = $this->vehicle->find($id);

		return view('operations.vehicles.show', compact('vehicle'));
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->vehicle->delete($id);

		return redirect()->route('vehicles.index');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getImages($id)
	{
		$vehicle = $this->vehicle->find($id);

		return view('operations.vehicles.upload', compact('id', 'vehicle'));
	}

	public function addImages(Request $request)
	{
		$save = $this->image->build($request->get('type'), $request->get('vehicle_id'), null, $request->file('file_data'), null)->addImages();

		if ( $save )
		{
			$this->vehicle->checkState($request->get('vehicle_id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function deleteFiles(Request $request)
	{
		$destroy = $this->image->build($request->get('type'), $request->get('key'), null, null, $request->get('path'))->destroyImage();

		if ( $destroy )
		{
			$this->vehicle->checkState($request->get('id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

}
