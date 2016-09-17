<?php

namespace Controlqtime\Core\Factory;

use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

abstract class Image
{
	/**
	 * @var string
	 */
	protected $dirEntity = 'Controlqtime\Core\Entities\\';
	
	/**
	 * @var
	 */
	protected $id;
	
	/**
	 * @var
	 */
	protected $repoId;
	
	/**
	 * @var
	 */
	protected $repo;
	
	/**
	 * @var
	 */
	protected $type;
	
	/**
	 * @var
	 */
	protected $file;
	
	/**
	 * @var
	 */
	protected $model;
	
	/**
	 * @var
	 */
	protected $entity;
	
	/**
	 * @var
	 */
	protected $name;
	
	/**
	 * @var
	 */
	protected $pathImgDelete;
	
	/**
	 * @var Storage
	 */
	protected $storage;
	
	/**
	 * Image constructor.
	 *
	 * @param Storage $storage
	 */
	public function __construct(Storage $storage)
	{
		$this->storage = $storage;
	}
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return time() . Str::random(15) . '.' . $this->file->getClientOriginalExtension();
	}
	
	/**
	 * @return mixed save files in S3 server
	 */
	public function moveImage()
	{
		return $this->file->storeAs($this->getPath(), $this->name, 's3');
	}
	
	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->repo . $this->id . $this->type . $this->repoId;
	}
	
	/**
	 * @return bool
	 */
	public function destroyImage()
	{
		DB::beginTransaction();
		
		try
		{
			$this->id = str_replace('/', '', $this->id);
			if ($this->entity->destroy($this->id))
			{
				Storage::delete($this->pathImgDelete);
				DB::commit();
			}
		} catch (Exception $e)
		{
			DB::rollback();
		}
		
		return true;
	}
	
	/**
	 * @return overwrite method in class concretes
	 */
	abstract protected function addImages();
	
}