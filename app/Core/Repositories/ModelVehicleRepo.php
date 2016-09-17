<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\ModelVehicleRepoInterface;

class ModelVehicleRepo extends BaseRepo implements ModelVehicleRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var ModelVehicle
	 */
	protected $model;
	
	/**
	 * ModelVehicleRepo constructor.
	 *
	 * @param ModelVehicle $model
	 */
	public function __construct(ModelVehicle $model)
	{
		$this->model = $model;
	}
	
}