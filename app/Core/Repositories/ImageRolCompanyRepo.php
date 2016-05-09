<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\ImageRolCompany;
use Controlqtime\Core\Contracts\ImageRolCompanyRepoInterface;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageRolCompanyRepo extends BaseUploadRepo implements ImageRolCompanyRepoInterface
{
    protected $model;

    public function __construct(ImageRolCompany $model)
    {
        $this->model = $model;
    }
    
    public function delete($id)
    {
        $this->model->destroy($id);
    }
    
}