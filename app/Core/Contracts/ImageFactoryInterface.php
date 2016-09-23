<?php

namespace Controlqtime\Core\Contracts;

interface ImageFactoryInterface {

	public function build($type, $id, $repoId, $file = null, $path = null);

}