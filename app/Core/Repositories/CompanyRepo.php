<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Traits\WhereMethodsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\CompanyRepoInterface;

class CompanyRepo extends BaseRepo implements CompanyRepoInterface
{
	use ListsTrait, WhereMethodsTrait;
	
	/**
	 * @var Company
	 */
	protected $model;
	
	/**
	 * CompanyRepo constructor.
	 *
	 * @param Company $model
	 */
	public function __construct(Company $model)
	{
		$this->model = $model;
	}
	
}