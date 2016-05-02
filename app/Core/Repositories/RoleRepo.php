<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\RoleRepoInterface;
use Controlqtime\Core\Entities\Role;

class RoleRepo extends BaseRepo implements RoleRepoInterface
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}