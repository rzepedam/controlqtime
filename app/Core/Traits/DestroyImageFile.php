<?php

namespace Controlqtime\Core\Traits;

trait DestroyImageFile
{
	/**
	 * @param $id
	 * @param $entity
	 */
	public function destroyImages($id, $entity)
	{
		$ids = explode(",", $id);
		
		if ($ids[0] != '')
		{
			foreach ($ids as $item)
			{
				if ($entity == 'certification')
					$images = $this->model->findOrFail($item)->imageCertificationEmployees;
				
				if ($entity == 'speciality')
					$images = $this->model->findOrFail($item)->imageSpecialityEmployees;
				
				if ($entity == 'professional_license')
					$images = $this->model->findOrFail($item)->imageProfessionalLicenseEmployees;
				
				if ($entity == 'disability')
					$images = $this->model->findOrFail($item)->imageDisabilityEmployees;
				
				if ($entity == 'disease')
					$images = $this->model->findOrFail($item)->imageDiseaseEmployees;
				
				if ($entity == 'exam')
					$images = $this->model->findOrFail($item)->imageExamEmployees;
				
				if ($entity == 'family_responsability')
					$images = $this->model->findOrFail($item)->imageFamilyResponsabilityEmployees;
				
				if (!$images->isEmpty())
				{
					foreach ($images as $image)
					{
						if (is_file(public_path() . $image->path))
							unlink(public_path() . $image->path);
					}
				}
			}
		}
	}
	
}