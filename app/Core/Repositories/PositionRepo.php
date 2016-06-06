<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\PositionRepoInterface;
use Controlqtime\Core\Entities\Position;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class PositionRepo extends BaseRepo implements PositionRepoInterface
{
    protected $model;

    public function __construct(Position $model)
    {
        $this->model = $model;
    }
}