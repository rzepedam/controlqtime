<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\TypeInstitution;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TypeInstitutionRepoInterface;

class TypeInstitutionRepo extends BaseRepo implements TypeInstitutionRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var TypeInstitution
	 */
	protected $model;
	
	/**
	 * TypeInstitutionRepo constructor.
	 *
	 * @param TypeInstitution $model
	 */
	public function __construct(TypeInstitution $model)
	{
		$this->model = $model;
	}
	
}