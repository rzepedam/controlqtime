<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoInterface;
use Controlqtime\Core\Contracts\Base\BaseRepoListsInterface;

interface TrademarkRepoInterface extends BaseRepoInterface, BaseRepoListsInterface
{
    public function findModelVehicles($id);
}