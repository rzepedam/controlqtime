<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Route;
use Controlqtime\Core\Traits\TrashedComposed;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\RouteRepoInterface;

class RouteRepo extends BaseRepo implements RouteRepoInterface
{
	use TrashedComposed;
	
	/**
	 * @var Route
	 */
	protected $model;
	
	/**
	 * RouteRepo constructor.
	 *
	 * @param Route $model
	 */
	public function __construct(Route $model)
	{
		$this->model = $model;
	}
}