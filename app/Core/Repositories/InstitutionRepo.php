<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\InstitutionRepoInterface;
use Controlqtime\Core\Entities\Institution;

class InstitutionRepo extends BaseRepo implements InstitutionRepoInterface
{
    protected $model;

    public function __construct(Institution $model)
    {
        $this->model = $model;
    }
}