<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Country;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\CountryRepoInterface;

class CountryRepo extends BaseRepo implements CountryRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Country
	 */
	protected $model;
	
	/**
	 * CountryRepo constructor.
	 *
	 * @param Country $model
	 */
	public function __construct(Country $model)
	{
		$this->model = $model;
	}
}