<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\BaseRepoListsInterface;

class BaseListsRepo implements BaseRepoListsInterface
{
    public function lists($column, $id)
    {
        return $this->model->lists($column, $id);
    }
}