<?php

namespace Controlqtime\Core\Repositories\Base;

use Controlqtime\Core\Contracts\Base\BaseRepoWhereInterface;

class BaseWhereAndListsRepo extends BaseRepoWithLists implements BaseRepoWhereInterface
{
    public function whereFirst($attribute, $value, $columns = array('*')) {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    public function whereLists($attribute, $value, $column) {
        return $this->model->where($attribute, '=', $value)->lists($column, 'id');
    }
}