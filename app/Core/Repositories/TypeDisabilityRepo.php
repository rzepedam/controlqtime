<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeDisabilityRepoInterface;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class TypeDisabilityRepo extends BaseRepo implements TypeDisabilityRepoInterface
{
    protected $model;

    public function __construct(TypeDisability $model)
    {
        $this->model = $model;
    }
}