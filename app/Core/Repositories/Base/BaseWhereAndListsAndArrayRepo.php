<?php

namespace Controlqtime\Core\Repositories\Base;

class BaseWhereAndListsAndArrayRepo extends BaseWhereAndListsRepo
{
    public function destroyWithArray($id)
    {
        $id_delete = explode(",", $id);
        $this->model->whereIn('id', $id_delete)->delete();
    }

}