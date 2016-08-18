<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\PeriodicityRepoInterface;
use Controlqtime\Core\Entities\Periodicity;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class PeriodicityRepo extends BaseRepo implements PeriodicityRepoInterface
{
	use ListsTrait;

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