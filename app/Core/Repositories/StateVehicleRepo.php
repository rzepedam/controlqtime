<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\StateVehicle;
use Controlqtime\Core\Contracts\StateVehicleRepoInterface;

class StateVehicleRepo implements StateVehicleRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var StateVehicle
	 */
	protected $model;
	
	/**
	 * StateVehicleRepo constructor.
	 *
	 * @param StateVehicle $model
	 */
	public function __construct(StateVehicle $model)
	{
		$this->model = $model;
	}
	
}