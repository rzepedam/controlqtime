<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeCertificationRepoInterface;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TypeCertificationRepo extends BaseRepo implements TypeCertificationRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(TypeCertification $model)
    {
        $this->model = $model;
    }
}