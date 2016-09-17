<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\DegreeRepoInterface;

class DegreeRepo extends BaseRepo implements DegreeRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Degree
	 */
	protected $model;
	
	/**
	 * DegreeRepo constructor.
	 *
	 * @param Degree $model
	 */
	public function __construct(Degree $model)
	{
		$this->model = $model;
	}
}