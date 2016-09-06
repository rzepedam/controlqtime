<?php

namespace Controlqtime\Core\Traits;

trait ListsTrait
{
    public function lists($column, $id)
    {
        return $this->model->pluck($column, $id);
    }
}