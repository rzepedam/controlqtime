<?php

namespace Controlqtime\Core\Traits;

use Exception;

trait TrashedComposed
{
	/**
	 * @param $attribute1
	 * @param $attribute2
	 * @param $value1
	 * @param $value2
	 *
	 * @return bool
	 */
	public function onlyTrashedComposed($attribute1, $attribute2, $value1, $value2)
	{
		try
		{
			$model = $this->model->onlyTrashed()
				->where($attribute1, $value1)
				->where($attribute2, $value2)
				->firstOrFail();
			
			return $model->restore();
		} catch ( Exception $e )
		{
			return false;
		}
	}
}