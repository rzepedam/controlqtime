<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Profession;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\ProfessionRepoInterface;

class ProfessionRepo extends BaseRepo implements ProfessionRepoInterface
{
	/**
	 * @var Profession
	 */
	protected $model;
	
	/**
	 * ProfessionRepo constructor.
	 *
	 * @param Profession $model
	 */
	public function __construct(Profession $model)
	{
		$this->model = $model;
	}
	
}