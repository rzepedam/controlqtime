<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class VehicleRepo extends BaseRepo implements VehicleRepoInterface
{
    protected $model;

    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }

    public function checkState($id)
    {
        $vehicle            = parent::find($id, ['imagePadrones', 'imageObligatoryInsurances', 'imagePatents', 'imageCirculationPermits']);
        $image_padron       = $vehicle->imagePadrones->count();
        $image_obl_ins      = $vehicle->imageObligatoryInsurances->count();
        $image_patent       = $vehicle->imagePatents->count();
        $image_cir_permit   = $vehicle->imageCirculationPermits->count();

        if ($image_padron > 0 && $image_obl_ins > 0 && $image_patent > 0 && $image_cir_permit > 0) {
            $vehicle->state     = 'available';
            $vehicle->condition = 'able';
            $vehicle->save();
        }else {
            $vehicle->state     = 'unavailable';
            $vehicle->condition = 'unable';
            $vehicle->save();
        }
    }
}