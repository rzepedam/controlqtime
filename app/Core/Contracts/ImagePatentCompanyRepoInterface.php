<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoUploadInterface;

interface ImagePatentCompanyRepoInterface extends BaseRepoUploadInterface
{
    public function delete($id);
}