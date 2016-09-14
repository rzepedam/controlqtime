<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Entities\MasterPieceVehicle;
use Controlqtime\Core\Contracts\MasterPieceVehicleRepoInterface;

class MasterPieceVehicleRepo extends BaseRepo  implements MasterPieceVehicleRepoInterface
{
	/**
	 * @var MasterPieceVehicle
	 */
	protected $model;

	/**
	 * PieceVehicleCheckFormRepo constructor.
	 *
	 * @param MasterPieceVehicle $model
	 */
	public function __construct(MasterPieceVehicle $model)
	{
		$this->model = $model;
	}
}