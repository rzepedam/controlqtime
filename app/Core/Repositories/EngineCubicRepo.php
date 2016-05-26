<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\EngineCubicRepoInterface;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class EngineCubicRepo extends BaseRepo implements EngineCubicRepoInterface{

	use ListsTrait;
	
	protected $model;

	public function __construct(EngineCubic $model)
	{
		$this->model = $model;
	}

}