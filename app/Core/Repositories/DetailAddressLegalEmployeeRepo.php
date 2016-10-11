<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Entities\DetailAddressLegalEmployee;
use Controlqtime\Core\Contracts\DetailAddressLegalEmployeeRepoInterface;

class DetailAddressLegalEmployeeRepo extends BaseRepo implements DetailAddressLegalEmployeeRepoInterface
{
	/**
	 * @var DetailAddressLegalEmployee
	 */
	protected $model;
	
	/**
	 * DetailAddressLegalEmployeeRepo constructor.
	 *
	 * @param DetailAddressLegalEmployee $model
	 */
	public function __construct(DetailAddressLegalEmployee $model)
	{
		$this->model = $model;
	}
}