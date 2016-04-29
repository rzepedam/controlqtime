<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Profession;
use Controlqtime\Core\Contracts\ProfessionRepoInterface;

class ProfessionRepo extends BaseRepo implements ProfessionRepoInterface
{
    protected $model;

    public function __construct(Profession $model)
    {
        $this->model = $model;
    }

}