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

	/**
	 * @param array $request
	 * @param Contract $contract
	 * @return mixed created
	 */
	public function saveMultipleTermsAndObligatories(array $request, $contract)
	{
		return $contract->terms_and_obligatories()->attach($request);
	}

}