<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImagePadronVehicleRepoInterface;
use Controlqtime\Core\Entities\ImagePadronVehicle;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImagePadronVehicleRepo extends BaseUploadRepo implements ImagePadronVehicleRepoInterface
{
    protected $model;

    public function __construct(ImagePadronVehicle $model)
    {
        $this->model = $model;
    }
}