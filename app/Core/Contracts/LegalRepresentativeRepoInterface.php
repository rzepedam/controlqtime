<?php

namespace Controlqtime\Core\Contracts;

interface LegalRepresentativeRepoInterface extends BaseRepoInterface, BaseRepoWhereInterface
{
    public function createWithSave(array $request, $company);
}