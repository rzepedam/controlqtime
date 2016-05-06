<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\RoleRepoInterface;
use Controlqtime\Core\Entities\Role;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class RoleRepo extends BaseRepo implements RoleRepoInterface
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}