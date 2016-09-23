<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Gender;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Contracts\GenderRepoInterface;

class GenderRepo implements GenderRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Gender
	 */
	protected $model;
	
	/**
	 * GenderRepo constructor.
	 *
	 * @param Gender $model
	 */
	public function __construct(Gender $model)
	{
		$this->model = $model;
	}
	
}