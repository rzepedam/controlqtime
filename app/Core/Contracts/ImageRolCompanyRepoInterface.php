<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoUploadInterface;

interface ImageRolCompanyRepoInterface extends BaseRepoUploadInterface
{
    public function delete($id);
}