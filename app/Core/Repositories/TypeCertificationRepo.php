<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\TypeCertification;

class TypeCertificationRepo extends BaseRepo
{
    protected $model;

    public function __construct(TypeCertification $model)
    {
        $this->model = $model;
    }
}