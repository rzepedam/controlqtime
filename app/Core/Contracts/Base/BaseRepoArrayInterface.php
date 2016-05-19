<?php

namespace Controlqtime\Core\Contracts\Base;

interface BaseRepoArrayInterface
{
    public function createOrUpdateWithArray(array $request, $entity);
    
    public function destroyArrayId($id);
}