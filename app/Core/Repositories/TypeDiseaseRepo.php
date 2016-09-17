<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TypeDiseaseRepoInterface;

class TypeDiseaseRepo extends BaseRepo implements TypeDiseaseRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var TypeDisease
	 */
	protected $model;
	
	/**
	 * TypeDiseaseRepo constructor.
	 *
	 * @param TypeDisease $model
	 */
	public function __construct(TypeDisease $model)
	{
		$this->model = $model;
	}
	
}