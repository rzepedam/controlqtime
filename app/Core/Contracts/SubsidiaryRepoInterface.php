<?php

namespace Controlqtime\Core\Contracts;

interface SubsidiaryRepoInterface extends BaseRepoInterface, BaseRepoWhereInterface
{
    public function createWithSave(array $request, $company);
}   