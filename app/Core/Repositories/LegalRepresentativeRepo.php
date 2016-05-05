<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\LegalRepresentativeRepoInterface;
use Controlqtime\Core\Entities\LegalRepresentative;

class LegalRepresentativeRepo extends BaseWhereAndListsRepo implements LegalRepresentativeRepoInterface
{
    protected $model;

    public function __construct(LegalRepresentative $model)
    {
        $this->model = $model;
    }

    public function createWithSave(array $request, $company)
    {
        for ($i = 0; $i < $request['count_legal_representative']; $i++)
        {
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
            
        }

    }
}