<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoListsInterface;

interface RegionRepoInterface extends BaseRepoListsInterface
{
    public function findProvinces($id);
}