<?php

namespace Controlqtime\Core\Repositories;

class BaseRepoWithLists extends BaseRepo
{
    public function lists($column, $id)
    {
        return $this->model->lists($column, $id);
    }
}