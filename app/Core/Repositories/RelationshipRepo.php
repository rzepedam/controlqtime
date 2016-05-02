<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\RelationshipRepoInterface;
use Controlqtime\Core\Entities\Relationship;

class RelationshipRepo extends BaseRepo implements RelationshipRepoInterface
{
    protected $model;

    public function __construct(Relationship $model)
    {
        $this->model = $model;
    }
}