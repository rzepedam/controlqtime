<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\EngineCubicRepoInterface;

class EngineCubicRepo extends BaseRepo implements EngineCubicRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var EngineCubic
	 */
	protected $model;
	
	/**
	 * EngineCubicRepo constructor.
	 *
	 * @param EngineCubic $model
	 */
	public function __construct(EngineCubic $model)
	{
		$this->model = $model;
	}
	
}