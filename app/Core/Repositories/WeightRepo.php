<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Weight;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\WeightRepoInterface;

class WeightRepo extends BaseRepo implements WeightRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Weight
	 */
	protected $model;
	
	/**
	 * WeightRepo constructor.
	 *
	 * @param Weight $model
	 */
	public function __construct(Weight $model)
	{
		$this->model = $model;
	}
	
}