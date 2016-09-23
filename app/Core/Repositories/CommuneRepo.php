<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Contracts\CommuneRepoInterface;

class CommuneRepo implements CommuneRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Commune
	 */
	protected $model;
	
	/**
	 * CommuneRepo constructor.
	 *
	 * @param Commune $model
	 */
	public function __construct(Commune $model)
	{
		$this->model = $model;
	}
}