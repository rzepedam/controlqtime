<?php

namespace Controlqtime\Core\Repositories\Base;

use Controlqtime\Core\Contracts\Base\BaseRepoListsInterface;

class BaseListsRepo implements BaseRepoListsInterface
{
    public function lists($column, $id)
    {
        return $this->model->lists($column, $id);
    }
}