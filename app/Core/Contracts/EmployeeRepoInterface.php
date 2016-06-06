<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoInterface;
use Controlqtime\Core\Contracts\Base\BaseRepoListsInterface;
use Controlqtime\Core\Contracts\Base\BaseRepoWhereInterface;

interface EmployeeRepoInterface extends BaseRepoInterface, BaseRepoListsInterface, BaseRepoWhereInterface {

	public function checkState($id);
	
}