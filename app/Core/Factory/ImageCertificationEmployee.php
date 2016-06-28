<?php

namespace Controlqtime\Core\Factory;

use Exception;

class ImageCertificationEmployee extends Image {

	public function __construct($id, $repoId, $type, $file, $class, $pathImgDelete)
	{
		$this->id            = $id;
		$this->repoId        = $repoId;
		$this->repo          = 'employee';
		$this->type          = $type;
		$this->file          = $file;
		$this->model         = $this->dirEntity . $class;
		$this->entity        = new $this->model;
		$this->pathImgDelete = $pathImgDelete;
	}

	public function addImages()
	{
		$this->name                     = $this->getName();
		$this->entity->path             = $this->getPath() . $this->name;
		$this->entity->orig_name        = $this->name;
		$this->entity->size             = $this->file->getSize();
		$this->entity->certification_id = $this->repoId;

		if ( ! $this->entity->save() )
		{
			throw new Exception('This element not save in DB');
		}

		$this->moveImage();
	}

}