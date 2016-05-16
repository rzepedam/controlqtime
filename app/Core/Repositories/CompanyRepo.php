<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\Lists;
use Controlqtime\Core\Traits\WhereMethods;

class CompanyRepo extends BaseRepo implements CompanyRepoInterface
{
    use Lists, WhereMethods;
    
    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    public function checkState($id)
    {
        $company        = parent::find($id, ['imageRolCompanies', 'imagePatentCompanies']);
        $image_rol      = $company->imageRolCompanies->count();
        $image_patent   = $company->imagePatentCompanies->count();

        if ($image_rol > 0 && $image_patent > 0) {
            $company->state = 'available';
            $company->save();
        }else {
            $company->state = 'unavailable';
            $company->save();
        }
    }
}