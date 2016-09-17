<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\StatePieceVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\StatePieceVehicleRepoInterface;

class StatePieceVehicleRepo extends BaseRepo implements StatePieceVehicleRepoInterface
{
	/**
	 * @var StatePieceVehicle
	 */
	protected $model;
	
	/**
	 * StatePieceVehicleRepo constructor.
	 *
	 * @param StatePieceVehicle $model
	 */
	public function __construct(StatePieceVehicle $model)
	{
		$this->model = $model;
	}
	
}