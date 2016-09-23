<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\DayTrip;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\DayTripRepoInterface;

class DayTripRepo extends BaseRepo implements DayTripRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var DayTrip
	 */
	protected $model;
	
	/**
	 * DayTripRepo constructor.
	 *
	 * @param DayTrip $model
	 */
	public function __construct(DayTrip $model)
	{
		$this->model = $model;
	}
	
}