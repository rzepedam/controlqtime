<?php

namespace Controlqtime\Core\Factory;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

abstract class Image {

	protected $dirEntity = 'Controlqtime\Core\Entities\\';
	protected $id;
	protected $repoId;
	protected $repo;
	protected $type;
	protected $file;
	protected $model;
	protected $entity;
	protected $name;
	protected $pathImgDelete;
	private $storage = '/storage/';

	public function getName()
	{
		return time() . Str::random(5) . '.' . $this->file->getClientOriginalExtension();
	}
	
	public function moveImage()
	{
		File::makeDirectory($this->getPath(), $mode = 0777, true, true);
		$this->file->move(public_path() . $this->getPath(), $this->name);
	}

	public function getPath()
	{
		return $this->storage . $this->repo . "/" . $this->id . "/" . $this->type . "/" . $this->repoId . "/";
	}

	public function destroyImage()
	{
		if ( is_file(public_path() . $this->pathImgDelete) )
		{
			if ( ! $this->entity->destroy($this->repoId) )
			{
				throw new Exception('Destroy DB not working');
			}

			unlink(public_path() . $this->pathImgDelete);

			return true;
		}

		throw new Exception('File not exists');
	}

	abstract protected function addImages();

}