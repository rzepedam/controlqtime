<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\StateVehicleRepoInterface;
use Controlqtime\Core\Entities\StateVehicle;
use Controlqtime\Core\Traits\ListsTrait;

class StateVehicleRepo implements StateVehicleRepoInterface{

	use ListsTrait;

	protected $model;

	public function __construct(StateVehicle $model)
	{
		$this->model = $model;
	}
}