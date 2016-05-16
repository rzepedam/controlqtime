<?php

namespace Controlqtime\Core\Traits;

trait Lists
{
    public function lists($column, $id)
    {
        return $this->model->lists($column, $id);
    }
}