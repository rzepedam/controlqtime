<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Traits\TrashedComposed;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\AreaRepoInterface;

class AreaRepo extends BaseRepo implements AreaRepoInterface
{
	use ListsTrait, TrashedComposed;
	
	/**
	 * @var Area
	 */
	protected $model;
	
	/**
	 * AreaRepo constructor.
	 *
	 * @param Area $model
	 */
	public function __construct(Area $model)
	{
		$this->model = $model;
	}
}