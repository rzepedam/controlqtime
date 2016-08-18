<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\PensionRepoInterface;
use Controlqtime\Core\Entities\Pension;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class PensionRepo extends BaseRepo implements PensionRepoInterface
{
	use ListsTrait;

	/**
	 * @var Pension
	 */
	protected $model;

	/**
	 * PensionRepo constructor.
	 * @param Pension $model
	 */
	public function __construct(Pension $model)
    {
        $this->model = $model;
    }
}