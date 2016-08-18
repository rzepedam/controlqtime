<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\NumHourRepoInterface;
use Controlqtime\Core\Entities\NumHour;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class NumHourRepo extends BaseRepo implements NumHourRepoInterface
{
	use ListsTrait;

	/**
	 * @var NumHour
	 */
	protected $model;

	/**
	 * NumHourRepo constructor.
	 * @param NumHour $model
	 */
	public function __construct(NumHour $model)
	{
		$this->model = $model;
	}
}