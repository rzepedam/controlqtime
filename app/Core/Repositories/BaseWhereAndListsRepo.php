<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\BaseRepoWhereInterface;

class BaseWhereAndListsRepo extends BaseRepoWithLists implements BaseRepoWhereInterface
{
    public function whereFirst($attribute, $value, $columns = array('*')) {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
}