<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\PensionRepoInterface;
use Controlqtime\Core\Entities\Pension;

class PensionRepo extends BaseRepo implements PensionRepoInterface
{
    protected $model;

    public function __construct(Pension $model)
    {
        $this->model = $model;
    }
}