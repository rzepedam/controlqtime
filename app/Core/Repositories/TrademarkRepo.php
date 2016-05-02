<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TrademarkRepoInterface;
use Controlqtime\Core\Entities\Trademark;

class TrademarkRepo extends BaseRepoWithLists implements TrademarkRepoInterface
{
    protected $model;

    public function __construct(Trademark $model)
    {
        $this->model = $model;
    }
}