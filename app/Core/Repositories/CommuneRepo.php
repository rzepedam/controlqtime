<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Repositories\Base\BaseListsRepo;


class CommuneRepo extends BaseListsRepo implements CommuneRepoInterface
{
    protected $model;

    public function __construct(Commune $model)
    {
        $this->model = $model;
    }
}