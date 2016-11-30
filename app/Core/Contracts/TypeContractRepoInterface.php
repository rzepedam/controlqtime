<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoInterface;
use Controlqtime\Core\Contracts\Base\BaseRepoListsInterface;
use Controlqtime\Core\Contracts\Base\BaseRepoTrashedComposedInterface;

interface TypeContractRepoInterface extends BaseRepoInterface, BaseRepoListsInterface, BaseRepoTrashedComposedInterface
{

}