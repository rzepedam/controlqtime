<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TermAndObligatoryRepoInterface;
use Controlqtime\Core\Entities\TermAndObligatory;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TermAndObligatoryRepo extends BaseRepo implements TermAndObligatoryRepoInterface
{
	/**
	 * @var TermAndObligatory
	 */
	protected $model;

	/**
	 * TermAndObligatoryRepo constructor.
	 * @param TermAndObligatory $model
	 */
	public function __construct(TermAndObligatory $model)
	{
		$this->model = $model;
	}
}