<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Traits\WhereMethodsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\CompanyRepoInterface;

class CompanyRepo extends BaseRepo implements CompanyRepoInterface
{
	use ListsTrait, WhereMethodsTrait;
	
	/**
	 * @var Company
	 */
	protected $model;
	
	/**
	 * CompanyRepo constructor.
	 *
	 * @param Company $model
	 */
	public function __construct(Company $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @param $id
	 */
	public function checkState($id)
	{
		$company      = parent::find($id, ['imageRolCompanies', 'imagePatentCompanies']);
		$image_rol    = $company->imageRolCompanies->count();
		$image_patent = $company->imagePatentCompanies->count();
		
		if ($image_rol > 0 && $image_patent > 0)
		{
			$company->state = 'enable';
			$company->save();
		} else
		{
			$company->state = 'disable';
			$company->save();
		}
	}
	
}