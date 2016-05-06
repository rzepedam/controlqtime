<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\AreaRepoInterface;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class AreaRepo extends BaseRepo implements AreaRepoInterface
{
    protected $model;

    public function __construct(Area $model)
    {
        $this->model = $model;
    }
}