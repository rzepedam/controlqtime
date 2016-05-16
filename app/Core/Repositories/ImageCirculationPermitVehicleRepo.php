<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImageCirculationPermitVehicleRepoInterface;
use Controlqtime\Core\Entities\ImageCirculationPermitVehicle;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageCirculationPermitVehicleRepo extends BaseUploadRepo implements ImageCirculationPermitVehicleRepoInterface
{
    protected $model;

    public function __construct(ImageCirculationPermitVehicle $model)
    {
        $this->model = $model;
    }
}