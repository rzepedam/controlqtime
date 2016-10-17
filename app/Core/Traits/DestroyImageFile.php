<?php

namespace Controlqtime\Core\Traits;

use Illuminate\Support\Facades\Storage;

trait DestroyImageFile
{
	/**
	 * @param $id
	 * @param $entity
	 *
	 * @return bool
	 */
	public function destroyImages($id, $entity)
	{
		$namespace = 'Controlqtime\Core\Entities\\' . $entity;
		$model     = new $namespace;
		$ids       = explode(",", $id);
		
		if ($ids[0] != '')
		{
			foreach ($ids as $item)
			{
				$images = $model->findOrFail($item)->imagesable;
				if (!$images->isEmpty())
				{
					foreach ($images as $image)
					{
						if (Storage::disk('s3')->exists($image->path))
						{
							Storage::disk('s3')->delete($image->path);
						}
					}
				}
			}
			
			return true;
		}
	}
	
}