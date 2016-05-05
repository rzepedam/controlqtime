<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\SubsidiaryRepoInterface;
use Controlqtime\Core\Entities\Subsidiary;

class SubsidiaryRepo extends BaseWhereAndListsRepo implements SubsidiaryRepoInterface
{
    protected $model;

    public function __construct(Subsidiary $model)
    {
        $this->model = $model;
    }
    
    public function createWithSave(array $request, $company)
    {
        for ($i = 0; $i < $request['count_subsidiary']; $i++) {
            
            $this->model = new Subsidiary([
                'address_suc'       => $request['address_suc'][$i],
                'commune_suc_id'    => $request['commune_suc_id'][$i],
                'num_suc'           => $request['num_suc'][$i],
                'lot_suc'           => $request['lot_suc'][$i],
                'ofi_suc'           => $request['ofi_suc'][$i],
                'floor_suc'         => $request['floor_suc'][$i],
                'muni_license_suc'  => $request['muni_license_suc'][$i],
                'email_suc'         => $request['email_suc'][$i],
                'phone1_suc'        => $request['phone1_suc'][$i],
                'phone2_suc'        => $request['phone2_suc'][$i]
            ]);
            
            $company->subsidiaries()->save($this->model);
            
        }
        
    }
        
}