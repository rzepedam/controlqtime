<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Traits\WhereMethodsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;

class TypeVehicleRepo extends BaseRepo implements TypeVehicleRepoInterface
{
	use ListsTrait, WhereMethodsTrait;
	
	/**
	 * @var TypeVehicle
	 */
	protected $model;
	
	/**
	 * TypeVehicleRepo constructor.
	 *
	 * @param TypeVehicle $model
	 */
	public function __construct(TypeVehicle $model)
	{
		$this->model = $model;
	}
	
}