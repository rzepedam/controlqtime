<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Repositories\Base\BaseListsRepo;
use Illuminate\Database\DatabaseManager as DB;

class RegionRepo extends BaseListsRepo implements RegionRepoInterface
{
    protected $model;

    public function __construct(Region $model)
    {
        $this->model = $model;
    }

    public function find($id) {
        return $this->model->findOrFail($id)->provinces->lists('name', 'id');
    }

}