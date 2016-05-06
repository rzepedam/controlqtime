<?php

namespace Controlqtime\Core\Contracts\Base;

interface BaseRepoArrayInterface
{
    public function createOrUpdateWithArray(array $request, $company);
    
    public function destroyWithArray($id);
}