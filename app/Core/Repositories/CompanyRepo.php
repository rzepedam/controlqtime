<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Traits\WhereMethodsTrait;

class CompanyRepo extends BaseRepo implements CompanyRepoInterface
{
    use ListsTrait, WhereMethodsTrait;
    
    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

	/**
	 * @param $id
	 */
	public function checkState($id)
	{
		$company = parent::find($id, ['imageRolCompanies', 'imagePatentCompanies']);
		$image_rol = $company->imageRolCompanies->count();
		$image_patent = $company->imagePatentCompanies->count();

		if ( $image_rol > 0 && $image_patent > 0 ) {
			$company->state = 'enable';
			$company->save();
		}else {
			$company->state = 'disable';
			$company->save();
		}
	}

}