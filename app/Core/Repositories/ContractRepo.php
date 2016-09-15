<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ContractRepoInterface;
use Controlqtime\Core\Entities\Contract;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class ContractRepo extends BaseRepo implements ContractRepoInterface
{
	/**
	 * @var Contract
	 */
	protected $model;

	/**
	 * ContractRepo constructor.
	 * @param Contract $model
	 */
	public function __construct(Contract $model)
	{
		$this->model = $model;
	}

}