<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeProfessionalLicenseRepoInterface;
use Controlqtime\Core\Entities\TypeProfessionalLicense;

class TypeProfessionalLicenseRepo extends BaseRepo implements TypeProfessionalLicenseRepoInterface
{
    protected $model;

    public function __construct(TypeProfessionalLicense $model)
    {
        $this->model = $model;
    }
}