<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Core\Contracts\ActivateVehicleInterface;

class ActivateVehicle extends Eloquent implements ActivateVehicleInterface
{
	/**
	 * @var VehicleRepoInterface
	 */
	protected $vehicle;
	
	/**
	 * ActivateVehicle constructor.
	 *
	 * @param VehicleRepoInterface $vehicle
	 */
	public function __construct(VehicleRepoInterface $vehicle)
	{
		$this->vehicle = $vehicle;
	}
	
	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function checkStateVehicle($id)
	{
		$vehicle = $this->vehicle->find($id, [
			'imagePadrones', 'imageObligatoryInsurances', 'imageCirculationPermits'
		]);
		
		if ($vehicle->imagePadrones->count() == 0)
			return $this->saveStateDisableVehicle($vehicle);
		
		if ($vehicle->imageObligatoryInsurances->count() == 0)
			return $this->saveStateDisableVehicle($vehicle);
		
		if ($vehicle->imageCirculationPermits->count() == 0)
			return $this->saveStateDisableVehicle($vehicle);
		
		return $this->saveStateEnableVehicle($vehicle);
	}
	
	/**
	 * @param $vehicle
	 *
	 * @return mixed
	 */
	public function saveStateDisableVehicle($vehicle)
	{
		$vehicle->state     = 'disable';
		$vehicle->condition = 'unavailable';
		
		return $vehicle->save();
	}
	
	/**
	 * @param $vehicle
	 *
	 * @return mixed
	 */
	private function saveStateEnableVehicle($vehicle)
	{
		$vehicle->state = 'enable';
		
		return $vehicle->save();
	}
	
}