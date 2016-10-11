<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Entities\DetailAddressCompany;
use Controlqtime\Core\Contracts\DetailAddressCompanyRepoInterface;

class DetailAddressCompanyRepo extends BaseRepo implements DetailAddressCompanyRepoInterface
{
	/**
	 * @var DetailAddressCompany
	 */
	protected $model;
	
	/**
	 * DetailAddressCompanyRepo constructor.
	 *
	 * @param DetailAddressCompany $model
	 */
	public function __construct(DetailAddressCompany $model)
	{
		$this->model = $model;
	}
}