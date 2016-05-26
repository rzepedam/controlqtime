<?php

namespace Controlqtime\Core\Repositories\Base;

use Controlqtime\Core\Contracts\Base\BaseRepoUploadInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BaseUploadRepo implements BaseRepoUploadInterface {

	public function addImages($repo, $file, $id, $type)
	{
		$path                   = $this->getPath($repo, $id, $type);
		$name                   = time() . $file->getClientOriginalName();
		$this->model->path      = $path . $name;
		$this->model->orig_name = $file->getClientOriginalName();
		$this->model->size		= $file->getSize();

		switch ($repo)
		{
			case 'company':
				$this->model->company_id = $id;
				break;

			case 'vehicle':
				$this->model->vehicle_id = $id;
				break;
		}

		if ( $this->model->save() )
		{
			$this->moveImage(public_path() . $path, $file, $name);

			return true;
		}
	}

	public function getPath($repo, $id, $type)
	{
		return $path = "/storage/" . $repo . "/" . $id . "/" . $type . "/";
	}

	public function moveImage($path, $file, $name)
	{
		File::makeDirectory($path, $mode = 0777, true, true);
		$file->move($path, $name);
	}

	public function destroyImage($path)
	{
		if ( is_file(public_path() . $path) )
		{
			unlink(public_path() . $path);

			return true;
		}
	}

	public function delete($id)
	{
		$this->model->destroy($id);
	}

}