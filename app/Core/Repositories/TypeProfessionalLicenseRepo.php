<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\TypeProfessionalLicense;

class TypeProfessionalLicenseRepo extends BaseRepo
{
    protected $model;

    public function __construct(TypeProfessionalLicense $model)
    {
        $this->model = $model;
    }
}