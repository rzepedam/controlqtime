<?php

namespace Controlqtime\Core\Traits;

trait ListsTrait
{
	/**
	 * @param $column
	 * @param $id
	 *
	 * @return list field
	 */
	public function lists($column, $id)
    {
        return $this->model->pluck($column, $id);
    }
}