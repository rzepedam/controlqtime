<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\PieceVehicleRepoInterface;

class PieceVehicleRepo extends BaseRepo implements PieceVehicleRepoInterface
{
	/**
	 * @var \Controlqtime\Core\Entities\PieceVehicle
	 */
	protected $model;
	
	/**
	 * PieceVehicleRepo constructor.
	 *
	 * @param \Controlqtime\Core\Entities\PieceVehicle $model
	 */
	public function __construct(PieceVehicle $model)
	{
		$this->model = $model;
	}
}