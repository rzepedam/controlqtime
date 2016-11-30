<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\City;
use Controlqtime\Core\Traits\TrashedComposed;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\CityRepoInterface;

class CityRepo extends BaseRepo implements CityRepoInterface
{
	use TrashedComposed;
	
	/**
	 * @var City
	 */
	protected $model;
	
	/**
	 * CityRepo constructor.
	 *
	 * @param City $model
	 */
	public function __construct(City $model)
	{
		$this->model = $model;
	}
}