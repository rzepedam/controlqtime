<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoInterface;
use Controlqtime\Core\Contracts\Base\BaseRepoListsInterface;

interface RegionRepoInterface extends BaseRepoInterface, BaseRepoListsInterface
{
	public function findProvinces($id);
}