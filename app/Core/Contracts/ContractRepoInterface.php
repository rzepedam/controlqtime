<?php

namespace Controlqtime\Core\Contracts;

use Controlqtime\Core\Contracts\Base\BaseRepoInterface;

interface ContractRepoInterface extends BaseRepoInterface {

	public function saveMultipleTermsAndObligatories(array $request, $contract);

}