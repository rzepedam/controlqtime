<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Profession;

class ProfessionRepo extends BaseRepo
{
    protected $model;

    public function __construct(Profession $model)
    {
        $this->model = $model;
    }

}