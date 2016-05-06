<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Subsidiary;
use Controlqtime\Core\Contracts\SubsidiaryRepoInterface;
use Controlqtime\Core\Repositories\Base\BaseWhereAndListsAndArrayRepo;

class SubsidiaryRepo extends BaseWhereAndListsAndArrayRepo implements SubsidiaryRepoInterface
{
    protected $model;

    public function __construct(Subsidiary $model)
    {
        $this->model = $model;
    }
    
    public function createOrUpdateWithArray(array $request, $company)
    {
        for ($i = 0; $i < $request['count_subsidiary']; $i++) {

            $id = $request['id_suc'][$i];

            if ($id == 0) {
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

            }else {
                $this->model = parent::find($id);
                $this->model->address_suc       = $request['address_suc'][$i];
                $this->model->commune_suc_id    = $request['commune_suc_id'][$i];
                $this->model->num_suc           = $request['num_suc'][$i];
                $this->model->lot_suc           = $request['lot_suc'][$i];
                $this->model->ofi_suc           = $request['ofi_suc'][$i];
                $this->model->floor_suc         = $request['floor_suc'][$i];
                $this->model->muni_license_suc  = $request['muni_license_suc'][$i];
                $this->model->email_suc         = $request['email_suc'][$i];
                $this->model->phone1_suc        = $request['phone1_suc'][$i];
                $this->model->phone2_suc        = $request['phone2_suc'][$i];

                $this->model->save();
            }
        }
    }
}