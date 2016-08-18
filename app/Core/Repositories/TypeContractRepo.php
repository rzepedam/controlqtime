<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeContractRepoInterface;
use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TypeContractRepo extends BaseRepo implements TypeContractRepoInterface
{
	use ListsTrait;

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