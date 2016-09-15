<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\MasterFormPieceVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\MasterFormPieceVehicleRepoInterface;

class MasterFormPieceVehicleRepo extends BaseRepo implements MasterFormPieceVehicleRepoInterface
{
	/**
	 * @var \Controlqtime\Core\Entities\MasterFormPieceVehicle
	 */
	protected $model;
	/**
	 * MasterFormPieceVehicleRepo constructor.
	 *
	 * @param \Controlqtime\Core\Entities\MasterFormPieceVehicle $model
	 */
	public function __construct(MasterFormPieceVehicle $model)
	{
		$this->model = $model;
	}
}