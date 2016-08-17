<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\DayTripRepoInterface;
use Controlqtime\Core\Entities\DayTrip;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class DayTripRepo extends BaseRepo implements DayTripRepoInterface
{
	/**
	 * @var DayTrip
	 */
	protected $model;

	/**
	 * DayTripRepo constructor.
	 * @param DayTrip $model
	 */
	public function __construct(DayTrip $model)
	{
		$this->model = $model;
	}
}