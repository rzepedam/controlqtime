<?php

namespace Controlqtime\Core\Contracts;

interface RegionRepoInterface extends BaseRepoListsInterface
{
    public function find($id);
}