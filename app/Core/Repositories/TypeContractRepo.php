<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeContractRepoInterface;
use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class TypeContractRepo extends BaseRepo implements TypeContractRepoInterface
{
	/**
	 * @var TypeContract
	 */
	protected $model;

	/**
	 * TypeContractRepo constructor.
	 * @param TypeContract $model
	 */
	public function __construct(TypeContract $model)
	{
		$this->model = $model;
	}
}