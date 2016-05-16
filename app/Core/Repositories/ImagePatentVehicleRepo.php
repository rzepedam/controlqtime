<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImagePatentVehicleRepoInterface;
use Controlqtime\Core\Entities\ImagePatentVehicle;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImagePatentVehicleRepo extends BaseUploadRepo implements ImagePatentVehicleRepoInterface
{
    protected $model;

    public function __construct(ImagePatentVehicle $model)
    {
        $this->model = $model;
    }
}