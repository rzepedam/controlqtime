<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\DegreeRepoInterface;
use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class DegreeRepo extends BaseRepo implements DegreeRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(Degree $model)
    {
        $this->model = $model;
    }
}