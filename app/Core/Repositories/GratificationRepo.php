<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\Gratification;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\GratificationRepoInterface;

class GratificationRepo extends BaseRepo implements GratificationRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Gratification
	 */
	protected $model;
	
	/**
	 * GratificationRepo constructor.
	 *
	 * @param Gratification $model
	 */
	public function __construct(Gratification $model)
	{
		$this->model = $model;
	}
	
}