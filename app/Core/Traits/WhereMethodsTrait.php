<?php

namespace Controlqtime\Core\Traits;

trait WhereMethodsTrait
{
    public function whereFirst($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    public function whereLists($attribute, $value, $column)
    {
        return $this->model->where($attribute, '=', $value)->lists($column, 'id');
    }

    public function whereIn($value, $columns = array('*'))
    {
        $id = explode(",", $value);
        return $this->model->whereIn('id', $id)->get($columns);
    }


}