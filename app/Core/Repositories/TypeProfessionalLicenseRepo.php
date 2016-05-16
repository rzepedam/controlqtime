<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeProfessionalLicenseRepoInterface;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TypeProfessionalLicenseRepo extends BaseRepo implements TypeProfessionalLicenseRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(TypeProfessionalLicense $model)
    {
        $this->model = $model;
    }
}