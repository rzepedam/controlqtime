<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;
use Controlqtime\Core\Contracts\DailyAssistanceRepoInterface;

class DailyAssistanceRepo extends BaseRepo implements DailyAssistanceRepoInterface
{
	/**
	 * @var DailyAssistanceApi
	 */
	protected $model;
	
	/**
	 * DailyAssistanceRepo constructor.
	 *
	 * @param DailyAssistanceApi $model
	 */
	public function __construct(DailyAssistanceApi $model)
	{
		$this->model = $model;
	}
}