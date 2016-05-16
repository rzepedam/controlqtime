<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoInterface;

interface VehicleRepoInterface extends BaseRepoInterface
{
    public function checkState($id);
}