<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\MaritalStatusRepoInterface;
use Controlqtime\Core\Entities\MaritalStatus;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class MaritalStatusRepo extends BaseRepo implements MaritalStatusRepoInterface
{
	/**
	 * @var MaritalStatus
	 */
	protected $model;

	/**
	 * MaritalStatusRepo constructor.
	 * @param MaritalStatus $model
	 */
	public function __construct(MaritalStatus $model)
	{
		$this->model = $model;
	}

}