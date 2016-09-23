<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\CheckVehicleForm;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\CheckVehicleFormRepoInterface;

class CheckVehicleFormRepo extends BaseRepo implements CheckVehicleFormRepoInterface
{
	/**
	 * @var CheckVehicleForm
	 */
	protected $model;
	
	/**
	 * CheckVehicleFormRepo constructor.
	 *
	 * @param CheckVehicleForm $model
	 */
	public function __construct(CheckVehicleForm $model)
	{
		$this->model = $model;
	}
}