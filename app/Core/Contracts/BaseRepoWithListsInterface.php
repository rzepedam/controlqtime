<?php

namespace Controlqtime\Core\Contracts;

interface BaseRepoWithListsInterface extends BaseRepoInterface
{
    public function lists($column, $id);
}