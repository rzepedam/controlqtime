<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Traits\Lists;

class ProvinceRepo implements ProvinceRepoInterface
{
    use Lists;

    protected $model;

    public function __construct(Province $model)
    {
        $this->model = $model;
    }

    public function findCommunes($id) {
        return $this->model->findOrFail($id)->communes->lists('name', 'id');
    }
}