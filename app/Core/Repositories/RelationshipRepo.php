<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Relationship;

class RelationshipRepo extends BaseRepo
{
    protected $model;

    public function __construct(Relationship $model)
    {
        $this->model = $model;
    }
}