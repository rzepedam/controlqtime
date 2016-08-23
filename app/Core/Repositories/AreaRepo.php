<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\AreaRepoInterface;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class AreaRepo extends BaseRepo implements AreaRepoInterface
{
	use ListsTrait;

	/**
	 * @var Area
	 */
	protected $model;

	/**
	 * AreaRepo constructor.
	 * @param Area $model
	 */
	public function __construct(Area $model)
    {
        $this->model = $model;
    }
}