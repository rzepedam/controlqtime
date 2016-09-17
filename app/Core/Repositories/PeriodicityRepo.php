<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\Periodicity;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\PeriodicityRepoInterface;

class PeriodicityRepo extends BaseRepo implements PeriodicityRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Periodicity
	 */
	protected $model;
	
	/**
	 * PeriodicityRepo constructor.
	 *
	 * @param Periodicity $model
	 */
	public function __construct(Periodicity $model)
	{
		$this->model = $model;
	}
}