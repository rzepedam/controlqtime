<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeInstitutionRepoInterface;
use Controlqtime\Core\Entities\TypeInstitution;
use Controlqtime\Core\Repositories\Base\BaseRepoWithLists;

class TypeInstitutionRepo extends BaseRepoWithLists implements TypeInstitutionRepoInterface
{
    protected $model;

    public function __construct(TypeInstitution $model)
    {
        $this->model = $model;
    }
}