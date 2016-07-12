<?php

namespace Controlqtime\Core\Api\Transformers;

use Controlqtime\Core\Api\Entities\AccessControl;
use League\Fractal\TransformerAbstract;

class AccessControlTransformer extends TransformerAbstract {

	public function transform(AccessControl $accessControl) {
		return [
			'id'			=> $accessControl->uuid,
			'rut'			=> $accessControl->rut,
			'num_device'	=> $accessControl->num_device,
			'status'		=> $accessControl->status,
			'created_at'	=> $accessControl->created_at
		];
	}

}