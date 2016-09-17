<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;

class TrademarkRepo extends BaseRepo implements TrademarkRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Trademark
	 */
	protected $model;
	
	/**
	 * TrademarkRepo constructor.
	 *
	 * @param Trademark $model
	 */
	public function __construct(Trademark $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function findModelVehicles($id)
	{
		return $this->model->findOrFail($id)->modelVehicles->pluck('name', 'id');
	}

}