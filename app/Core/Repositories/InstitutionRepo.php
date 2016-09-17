<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\InstitutionRepoInterface;

class InstitutionRepo extends BaseRepo implements InstitutionRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Institution
	 */
	protected $model;
	
	/**
	 * InstitutionRepo constructor.
	 *
	 * @param Institution $model
	 */
	public function __construct(Institution $model)
	{
		$this->model = $model;
	}
	
}