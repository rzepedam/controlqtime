<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Traits\Lists;

class RegionRepo implements RegionRepoInterface
{
    use Lists;

    protected $model;

    public function __construct(Region $model)
    {
        $this->model = $model;
    }

    public function findProvinces($id) {
        return $this->model->findOrFail($id)->provinces->lists('name', 'id');
    }

}