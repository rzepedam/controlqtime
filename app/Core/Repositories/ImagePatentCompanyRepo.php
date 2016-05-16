<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImagePatentCompanyRepoInterface;
use Controlqtime\Core\Entities\ImagePatentCompany;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImagePatentCompanyRepo extends BaseUploadRepo implements ImagePatentCompanyRepoInterface
{
    protected $model;

    public function __construct(ImagePatentCompany $model)
    {
        $this->model = $model;
    }
    
}