<?php

namespace Controlqtime\Core\Factory;

use DB;

class ImageExamEmployee extends Image
{
	/**
	 * ImageExamEmployee constructor.
	 *
	 * @param \Illuminate\Support\Facades\Storage $id
	 * @param $repoId
	 * @param $type
	 * @param $file
	 * @param $class
	 * @param $pathImgDelete
	 */
	public function __construct($id, $repoId, $type, $file, $class, $pathImgDelete)
	{
		$this->id            = $id . '/';
		$this->repoId        = $repoId . '/';
		$this->repo          = 'employee/';
		$this->type          = $type . '/';
		$this->file          = $file;
		$this->model         = $this->dirEntity . $class;
		$this->entity        = new $this->model;
		$this->pathImgDelete = $pathImgDelete;
	}
	
	/**
	 * @return bool
	 */
	public function addImages()
	{
		DB::beginTransaction();
		
		try
		{
			$this->name              = $this->getName();
			$this->entity->path      = $this->getPath() . $this->name;
			$this->entity->orig_name = $this->name;
			$this->entity->size      = $this->file->getSize();
			$this->entity->exam_id   = $this->repoId;
			$this->entity->save();
			$this->moveImage();
			
			DB::commit();
		} catch (Exception $e)
		{
			DB::rollback();
		}
		
		return true;
	}
	
}