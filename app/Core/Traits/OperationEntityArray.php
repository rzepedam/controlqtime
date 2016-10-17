<?php

namespace Controlqtime\Core\Traits;

use Controlqtime\Core\Entities\Image;

trait OperationEntityArray
{
	/**
	 * @param $id
	 * @param $entity
	 *
	 * @return bool
	 */
	public function destroyArrayId($id, $entity)
	{
		$id_delete = explode(",", $id);
		
		if ($entity != '' && $id_delete[0] != '')
		{
			for ($i = 0; $i < count($id_delete); $i++)
			{
				$images = $this->model->find($id_delete[$i])->imagesable;
				$image  = new Image();
				if ($images->count() > 0)
				{
					$id = array();
					foreach ($images as $img)
					{
						array_push($id, $img->id);
					}
					
					$image->whereIn('id', $id)->delete();
				}
			}
			
			return $this->model->whereIn('id', $id_delete)->delete();
		}
		
		return $this->model->whereIn('id', $id_delete)->delete();
	}
	
}