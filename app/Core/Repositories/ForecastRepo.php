<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\ForecastRepoInterface;

class ForecastRepo extends BaseRepo implements ForecastRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Forecast
	 */
	protected $model;
	
	/**
	 * ForecastRepo constructor.
	 *
	 * @param Forecast $model
	 */
	public function __construct(Forecast $model)
	{
		$this->model = $model;
	}
}