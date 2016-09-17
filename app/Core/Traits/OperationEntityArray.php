<?php

namespace Controlqtime\Core\Traits;

trait OperationEntityArray
{
	/**
	 * @param $id
	 */
	public function destroyArrayId($id)
	{
		$id_delete = explode(",", $id);
		$this->model->whereIn('id', $id_delete)->delete();
	}
	
}