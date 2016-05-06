<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Entities\LegalRepresentative;
use Controlqtime\Core\Repositories\Base\BaseWhereAndListsAndArrayRepo;

class LegalRepresentativeRepo extends BaseWhereAndListsAndArrayRepo implements LegalRepresentativeRepoInterface
{
    protected $model;

    public function __construct(LegalRepresentative $model)
    {
        $this->model = $model;
    }

    public function createOrUpdateWithArray(array $request, $company)
    {
        for ($i = 0; $i < $request['count_legal_representative']; $i++) {

            $id = $request['id_legal'][$i];

            if ($id == 0) {
                $this->model = new LegalRepresentative([
                    'male_surname'      => $request['male_surname'][$i],
                    'female_surname'    => $request['female_surname'][$i],
                    'first_name'        => $request['first_name'][$i],
                    'second_name'       => $request['second_name'][$i],
                    'rut_legal'         => $request['rut_legal'][$i],
                    'birthday'          => $request['birthday'][$i],
                    'nationality_id'    => $request['nationality_id'][$i],
                    'email_legal'       => $request['email_legal'][$i],
                    'phone1_legal'      => $request['phone1_legal'][$i],
                    'phone2_legal'      => $request['phone2_legal'][$i]
                ]);

                $company->legalRepresentatives()->save($this->model);

            }else {
                $this->model = parent::find($id);
                $this->model->male_surname      = $request['male_surname'][$i];
                $this->model->female_surname    = $request['female_surname'][$i];
                $this->model->first_name        = $request['first_name'][$i];
                $this->model->second_name       = $request['second_name'][$i];
                $this->model->rut_legal         = $request['rut_legal'][$i];
                $this->model->birthday          = $request['birthday'][$i];
                $this->model->nationality_id    = $request['nationality_id'][$i];
                $this->model->email_legal       = $request['email_legal'][$i];
                $this->model->phone1_legal      = $request['phone1_legal'][$i];
                $this->model->phone2_legal      = $request['phone2_legal'][$i];

                $this->model->save();
            }
        }
    }
}