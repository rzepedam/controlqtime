<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TypeSpecialityRepoInterface;

class TypeSpecialityRepo extends BaseRepo implements TypeSpecialityRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var TypeSpeciality
	 */
	protected $model;
	
	/**
	 * TypeSpecialityRepo constructor.
	 *
	 * @param TypeSpeciality $model
	 */
	public function __construct(TypeSpeciality $model)
	{
		$this->model = $model;
	}
	
}