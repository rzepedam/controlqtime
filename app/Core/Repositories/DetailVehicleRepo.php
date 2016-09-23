<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\DetailVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\DetailVehicleRepoInterface;

class DetailVehicleRepo extends BaseRepo implements DetailVehicleRepoInterface
{
	/**
	 * @var DetailVehicle
	 */
	protected $model;
	
	/**
	 * DetailVehicleRepo constructor.
	 *
	 * @param DetailVehicle $model
	 */
	public function __construct(DetailVehicle $model)
	{
		$this->model = $model;
	}
	
}