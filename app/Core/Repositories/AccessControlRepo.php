<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Contracts\AccessControlRepoInterface;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\WhereMethodsTrait;

class AccessControlRepo extends BaseRepo implements AccessControlRepoInterface
{
	use WhereMethodsTrait;
	
	/**
	 * @var AccessControlApi
	 */
	protected $model;
	
	public function __construct(AccessControlApi $model)
	{
		$this->model = $model;
	}
}