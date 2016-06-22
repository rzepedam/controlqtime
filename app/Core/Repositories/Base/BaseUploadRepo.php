<?php

namespace Controlqtime\Core\Repositories\Base;

use Controlqtime\Core\Contracts\Base\BaseRepoUploadInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BaseUploadRepo implements BaseRepoUploadInterface {

	public function addImages($repo, $file, $id, $type, $subRepoId = null)
	{
		$path                   = $this->getPath($repo, $id, $type, $subRepoId);
		$name                   = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
		$this->model->path      = $path . $name;
		$this->model->orig_name = $name;
		$this->model->size		= $file->getSize();

		switch ($repo)
		{
			case 'company':
				$this->model->company_id = $id;
				break;

			case 'vehicle':
				$this->model->vehicle_id = $id;
				break;

			case 'employee':
				if($type == 'certification')
					$this->model->certification_id = $subRepoId;

				if($type == 'speciality')
					$this->model->speciality_id = $subRepoId;

				if($type == 'professional_license')
					$this->model->professional_license_id = $subRepoId;

				if($type == 'disability')
					$this->model->disability_id = $subRepoId;

				if($type == 'disease')
					$this->model->disease_id = $subRepoId;

				if($type == 'exam')
					$this->model->exam_id = $subRepoId;

				if($type == 'family_responsability')
					$this->model->family_responsability_id = $subRepoId;

				break;
		}

		if ( $this->model->save() )
		{
			$this->moveImage(public_path() . $path, $file, $name);

			return true;
		}
	}

	public function getPath($repo, $id, $type, $subRepoId)
	{
		$path = "/storage/" . $repo . "/" . $id . "/" . $type . "/" . $subRepoId . "/";
		return $path;
	}

	public function moveImage($path, $file, $name)
	{
		File::makeDirectory($path, $mode = 0775, true, true);
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