<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeDisabilityRepoInterface;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TypeDisabilityRepo extends BaseRepo implements TypeDisabilityRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(TypeDisability $model)
    {
        $this->model = $model;
    }
}