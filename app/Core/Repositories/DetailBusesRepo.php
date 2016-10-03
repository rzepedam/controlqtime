<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\DetailBuses;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\DetailBusesRepoInterface;

class DetailBusesRepo extends BaseRepo implements DetailBusesRepoInterface
{
	/**
	 * @var DetailBuses
	 */
	protected $model;
	
	/**
	 * DetailBusesRepo constructor.
	 *
	 * @param DetailBuses $model
	 */
	public function __construct(DetailBuses $model)
	{
		$this->model = $model;
	}
}