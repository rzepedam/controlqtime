<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\GenderRepoInterface;
use Controlqtime\Core\Entities\Gender;
use Controlqtime\Core\Traits\ListsTrait;

class GenderRepo implements GenderRepoInterface{

	use ListsTrait;

	protected $model;

	public function __construct(Gender $model)
	{
		$this->model = $model;
	}

}