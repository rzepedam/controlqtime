<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Entities\LegalRepresentative;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Traits\WhereMethodsTrait;

class LegalRepresentativeRepo extends BaseRepo implements LegalRepresentativeRepoInterface
{
	use WhereMethodsTrait;

	/**
	 * @var LegalRepresentative
	 */
	protected $model;

	/**
	 * LegalRepresentativeRepo constructor.
	 * @param LegalRepresentative $model
	 */
	public function __construct(LegalRepresentative $model)
	{
		$this->model = $model;
	}

}