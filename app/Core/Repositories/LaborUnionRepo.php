<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\LaborUnionRepoInterface;
use Controlqtime\Core\Entities\LaborUnion;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class LaborUnionRepo extends BaseRepo implements LaborUnionRepoInterface{
	
	protected $model;

	public function __construct(LaborUnion $model)
	{
		$this->model = $model;
	}
	
}