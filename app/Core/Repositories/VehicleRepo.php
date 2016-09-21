<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Traits\WhereMethodsTrait;

class VehicleRepo extends BaseRepo implements VehicleRepoInterface
{
	use WhereMethodsTrait;
	
	/**
	 * @var Vehicle
	 */
	protected $model;
	
	/**
	 * VehicleRepo constructor.
	 *
	 * @param Vehicle $model
	 */
	public function __construct(Vehicle $model)
	{
		$this->model = $model;
	}
	
}