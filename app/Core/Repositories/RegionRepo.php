<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Contracts\RegionRepoInterface;

class RegionRepo implements RegionRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Region
	 */
	protected $model;
	
	/**
	 * RegionRepo constructor.
	 *
	 * @param Region $model
	 */
	public function __construct(Region $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function findProvinces($id)
	{
		return $this->model->findOrFail($id)->provinces->pluck('name', 'id');
	}
	
}