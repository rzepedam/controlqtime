<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Traits\Lists;

class CommuneRepo implements CommuneRepoInterface
{
    use Lists;

    protected $model;

    public function __construct(Commune $model)
    {
        $this->model = $model;
    }
}