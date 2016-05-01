<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Pension;

class PensionRepo extends BaseRepo
{
    protected $model;

    public function __construct(Pension $model)
    {
        $this->model = $model;
    }
}