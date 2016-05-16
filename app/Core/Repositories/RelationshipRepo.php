<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\RelationshipRepoInterface;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class RelationshipRepo extends BaseRepo implements RelationshipRepoInterface
{
    use ListsTrait;

    protected $model;

    public function __construct(Relationship $model)
    {
        $this->model = $model;
    }
}