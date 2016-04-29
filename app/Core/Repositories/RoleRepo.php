<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Role;

class RoleRepo extends BaseRepo
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}