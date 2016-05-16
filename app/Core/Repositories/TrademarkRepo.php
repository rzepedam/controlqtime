<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TrademarkRepoInterface;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\Lists;

class TrademarkRepo extends BaseRepo implements TrademarkRepoInterface
{
    use Lists;

    protected $model;

    public function __construct(Trademark $model)
    {
        $this->model = $model;
    }

    public function findModelVehicles($id) {
        return $this->model->findOrFail($id)->modelVehicles->lists('name', 'id');
    }
}