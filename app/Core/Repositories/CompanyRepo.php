<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Repositories\Base\BaseWhereAndListsRepo;

class CompanyRepo extends BaseWhereAndListsRepo implements CompanyRepoInterface
{
    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }
}