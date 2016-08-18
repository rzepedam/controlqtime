<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\GratificationRepoInterface;
use Controlqtime\Core\Entities\Gratification;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class GratificationRepo extends BaseRepo implements GratificationRepoInterface
{
	/**
	 * @var Gratification
	 */
	protected $model;

	/**
	 * GratificationRepo constructor.
	 * @param Gratification $model
	 */
	public function __construct(Gratification $model)
	{
		$this->model = $model;
	}

}