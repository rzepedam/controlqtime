<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Address;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\AddressRepoInterface;

class AddressRepo extends BaseRepo implements AddressRepoInterface
{
	/**
	 * @var Address
	 */
	protected $model;
	
	/**
	 * AddressRepo constructor.
	 *
	 * @param Address $model
	 */
	public function __construct(Address $model)
	{
		$this->model = $model;
	}
}