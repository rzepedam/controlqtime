<?php

namespace Controlqtime\Core\Contracts;

interface ImageFactoryInterface {

	public function build($type, $id = null, $repoId, $file = null, $path = null);

}