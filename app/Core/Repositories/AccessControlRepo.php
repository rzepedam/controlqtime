<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Contracts\AccessControlRepoInterface;

class AccessControlRepo extends BaseRepo implements AccessControlRepoInterface
{
	protected $model;

	public function __construct(AccessControlApi $model)
	{
		$this->model = $model;
	}
}