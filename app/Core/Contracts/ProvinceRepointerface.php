<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoListsInterface;

interface ProvinceRepoInterface extends BaseRepoListsInterface
{
    public function findCommunes($id);
}