<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\AccessControlRepoInterface;
use Controlqtime\Core\Entities\AccessControl;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class AccessControlRepo extends BaseRepo implements AccessControlRepoInterface
{
	protected $model;

	public function __construct(AccessControl $model)
	{
		$this->model = $model;
	}
}