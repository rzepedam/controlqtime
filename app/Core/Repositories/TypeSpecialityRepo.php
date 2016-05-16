<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeSpecialityRepoInterface;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TypeSpecialityRepo extends BaseRepo implements TypeSpecialityRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(TypeSpeciality $model)
    {
        $this->model = $model;
    }
}