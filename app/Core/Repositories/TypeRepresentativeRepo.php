<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeRepresentativeRepoInterface;
use Controlqtime\Core\Entities\TypeRepresentative;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TypeRepresentativeRepo extends BaseRepo implements TypeRepresentativeRepoInterface{
	
	use ListsTrait;
	
	protected $model;

	public function __construct(TypeRepresentative $model)
	{
		$this->model = $model;
	}

}