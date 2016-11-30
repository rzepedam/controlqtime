<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Core\Traits\TrashedComposed;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TypeContractRepoInterface;

class TypeContractRepo extends BaseRepo implements TypeContractRepoInterface
{
	use ListsTrait, TrashedComposed;
	
	/**
	 * @var TypeContract
	 */
	protected $model;
	
	/**
	 * TypeContractRepo constructor.
	 *
	 * @param TypeContract $model
	 */
	public function __construct(TypeContract $model)
	{
		$this->model = $model;
	}
}