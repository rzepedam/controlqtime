<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Trademark;

class TrademarkRepo extends BaseRepo
{
    protected $model;

    public function __construct(Trademark $model)
    {
        $this->model = $model;
    }
}