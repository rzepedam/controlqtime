<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\WeightRepoInterface;
use Controlqtime\Core\Entities\Weight;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class WeightRepo extends BaseRepo implements WeightRepoInterface{
	
	use ListsTrait;
	
	protected $model;

	public function __construct(Weight $model)
	{
		$this->model = $model;
	}

}