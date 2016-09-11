<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\DateDocumentationVehicleRepoInterface;
use Controlqtime\Core\Entities\DateDocumentationVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class DateDocumentationVehicleRepo extends BaseRepo implements DateDocumentationVehicleRepoInterface
{
	/**
	 * @var DateDocumentationVehicle
	 */
	protected $model;

	/**
	 * DateDocumentationVehicleRepo constructor.
	 * @param DateDocumentationVehicle $model
	 */
	public function __construct(DateDocumentationVehicle $model)
	{
		$this->model = $model;
	}
}