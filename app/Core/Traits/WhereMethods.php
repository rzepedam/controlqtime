<?php

namespace Controlqtime\Core\Traits;

trait WhereMethods
{
    public function whereFirst($attribute, $value, $columns = array('*')) {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    public function whereLists($attribute, $value, $column) {
        return $this->model->where($attribute, '=', $value)->lists($column, 'id');
    }
}