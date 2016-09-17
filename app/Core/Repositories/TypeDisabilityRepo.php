<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TypeDisabilityRepoInterface;

class TypeDisabilityRepo extends BaseRepo implements TypeDisabilityRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var TypeDisability
	 */
	protected $model;
	
	/**
	 * TypeDisabilityRepo constructor.
	 *
	 * @param TypeDisability $model
	 */
	public function __construct(TypeDisability $model)
	{
		$this->model = $model;
	}
	
}