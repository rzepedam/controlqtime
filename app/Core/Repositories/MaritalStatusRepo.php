<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\MaritalStatus;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\MaritalStatusRepoInterface;

class MaritalStatusRepo extends BaseRepo implements MaritalStatusRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var MaritalStatus
	 */
	protected $model;
	
	/**
	 * MaritalStatusRepo constructor.
	 *
	 * @param MaritalStatus $model
	 */
	public function __construct(MaritalStatus $model)
	{
		$this->model = $model;
	}
	
}