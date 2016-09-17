<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\Nationality;
use Controlqtime\Core\Contracts\NationalityRepoInterface;

class NationalityRepo implements NationalityRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Nationality
	 */
	protected $model;
	
	/**
	 * NationalityRepo constructor.
	 *
	 * @param Nationality $model
	 */
	public function __construct(Nationality $model)
	{
		$this->model = $model;
	}
}