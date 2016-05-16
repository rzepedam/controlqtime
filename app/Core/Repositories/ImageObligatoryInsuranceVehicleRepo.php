<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImageObligatoryInsuranceVehicleRepoInterface;
use Controlqtime\Core\Entities\ImageObligatoryInsuranceVehicle;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageObligatoryInsuranceVehicleRepo extends BaseUploadRepo implements ImageObligatoryInsuranceVehicleRepoInterface
{
    protected $model;

    public function __construct(ImageObligatoryInsuranceVehicle $model)
    {
        $this->model = $model;
    }
}