<?php

namespace Controlqtime\Core\Factory;

use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

abstract class Image
{
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
	/**
	 * @var Storage
	 */
	protected $storage;

	/**
	 * Image constructor.
	 * @param Storage $storage
	 */
	public function __construct(Storage $storage)
	{
		$this->storage = $storage;
	}

	public function getName()
	{
		return time() . Str::random(15) . '.' . $this->file->getClientOriginalExtension();
	}

	public function moveImage()
	{
		$this->file->storeAs($this->getPath(), $this->name, 's3');
	}

	public function getPath()
	{
		return $this->repo . $this->id . $this->type . $this->repoId;
	}

	public function destroyImage()
	{
		DB::beginTransaction();

		try {
			$this->id = str_replace('/', '', $this->id);
			if ( $this->entity->destroy($this->id) )
			{
				Storage::delete($this->pathImgDelete);
				DB::commit();
			}
		} catch ( Exception $e ) {
			DB::rollback();
		}

		return true;
	}

	abstract protected function addImages();

}