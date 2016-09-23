<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Mutuality;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\MutualityRepoInterface;

class MutualityRepo extends BaseRepo implements MutualityRepoInterface
{
	/**
	 * @var Mutuality
	 */
	protected $model;
	
	/**
	 * MutualityRepo constructor.
	 *
	 * @param Mutuality $model
	 */
	public function __construct(Mutuality $model)
	{
		$this->model = $model;
	}
	
}