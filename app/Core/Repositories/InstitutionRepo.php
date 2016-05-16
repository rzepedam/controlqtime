<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\InstitutionRepoInterface;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class InstitutionRepo extends BaseRepo implements InstitutionRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(Institution $model)
    {
        $this->model = $model;
    }
}