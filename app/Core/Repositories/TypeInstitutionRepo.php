<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeInstitutionRepoInterface;
use Controlqtime\Core\Entities\TypeInstitution;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TypeInstitutionRepo extends BaseRepo implements TypeInstitutionRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(TypeInstitution $model)
    {
        $this->model = $model;
    }
}