<?php

namespace Controlqtime\Core\Contracts;

interface BaseRepoListsInterface
{
    public function lists($column, $id);
}