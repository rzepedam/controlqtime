<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\CountryRepoInterface;
use Controlqtime\Core\Entities\Country;
use Controlqtime\Core\Repositories\Base\BaseRepoWithLists;

class CountryRepo extends BaseRepoWithLists implements CountryRepoInterface
{
    protected $model;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }
}