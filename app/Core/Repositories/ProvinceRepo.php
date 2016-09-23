<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;

class ProvinceRepo implements ProvinceRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Province
	 */
	protected $model;
	
	/**
	 * ProvinceRepo constructor.
	 *
	 * @param Province $model
	 */
	public function __construct(Province $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function findCommunes($id)
	{
		return $this->model->findOrFail($id)->communes->pluck('name', 'id');
	}
}