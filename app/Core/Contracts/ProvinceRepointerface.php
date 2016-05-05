<?php

namespace Controlqtime\Core\Contracts;

interface ProvinceRepoInterface extends BaseRepoListsInterface
{
    public function find($id);
}