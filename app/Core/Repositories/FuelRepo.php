<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\FuelRepoInterface;

class FuelRepo extends BaseRepo implements FuelRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Fuel
	 */
	protected $model;
	
	/**
	 * FuelRepo constructor.
	 *
	 * @param Fuel $model
	 */
	public function __construct(Fuel $model)
	{
		$this->model = $model;
	}
}