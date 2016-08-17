<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\PeriodicityRepoInterface;
use Controlqtime\Core\Entities\Periodicity;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class PeriodicityRepo extends BaseRepo implements PeriodicityRepoInterface
{
	/**
	 * @var Periodicity
	 */
	protected $model;

	/**
	 * PeriodicityRepo constructor.
	 * @param Periodicity $model
	 */
	public function __construct(Periodicity $model)
	{
		$this->model = $model;
	}
}