<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\NumHourRepoInterface;
use Controlqtime\Core\Entities\NumHour;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class NumHourRepo extends BaseRepo implements NumHourRepoInterface
{
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