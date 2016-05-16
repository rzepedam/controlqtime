<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Traits\ListsTrait;

class CommuneRepo implements CommuneRepoInterface
{
    use ListsTrait;

    protected $model;

    public function __construct(Commune $model)
    {
        $this->model = $model;
    }
}