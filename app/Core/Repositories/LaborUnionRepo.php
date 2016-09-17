<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\LaborUnion;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\LaborUnionRepoInterface;

class LaborUnionRepo extends BaseRepo implements LaborUnionRepoInterface
{
	/**
	 * @var LaborUnion
	 */
	protected $model;
	
	/**
	 * LaborUnionRepo constructor.
	 *
	 * @param LaborUnion $model
	 */
	public function __construct(LaborUnion $model)
	{
		$this->model = $model;
	}
	
}