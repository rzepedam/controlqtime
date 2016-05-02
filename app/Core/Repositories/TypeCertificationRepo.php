<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeCertificationRepoInterface;
use Controlqtime\Core\Entities\TypeCertification;

class TypeCertificationRepo extends BaseRepo implements TypeCertificationRepoInterface
{
    protected $model;

    public function __construct(TypeCertification $model)
    {
        $this->model = $model;
    }
}