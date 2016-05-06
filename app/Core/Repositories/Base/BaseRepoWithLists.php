<?php

namespace Controlqtime\Core\Repositories\Base;

class BaseRepoWithLists extends BaseRepo
{
    public function lists($column, $id)
    {
        return $this->model->lists($column, $id);
    }
}