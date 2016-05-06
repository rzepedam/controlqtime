<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeSpecialityRepoInterface;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class TypeSpecialityRepo extends BaseRepo implements TypeSpecialityRepoInterface
{
    protected $model;

    public function __construct(TypeSpeciality $model)
    {
        $this->model = $model;
    }
}