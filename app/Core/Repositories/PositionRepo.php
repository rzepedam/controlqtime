<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Position;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\PositionRepoInterface;

class PositionRepo extends BaseRepo implements PositionRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Position
	 */
	protected $model;
	
	/**
	 * PositionRepo constructor.
	 *
	 * @param Position $model
	 */
	public function __construct(Position $model)
	{
		$this->model = $model;
	}
}