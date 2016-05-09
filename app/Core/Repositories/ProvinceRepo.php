<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Repositories\Base\BaseListsRepo;

class ProvinceRepo extends BaseListsRepo implements ProvinceRepoInterface
{
    protected $model;

    public function __construct(Province $model)
    {
        $this->model = $model;
    }

    public function findCommunes($id) {
        return $this->model->findOrFail($id)->communes->lists('name', 'id');
    }
}