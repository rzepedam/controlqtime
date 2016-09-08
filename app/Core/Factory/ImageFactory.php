<?php

namespace Controlqtime\Core\Factory;

use Controlqtime\Core\Contracts\ImageFactoryInterface;
use Exception;

class ImageFactory implements ImageFactoryInterface {

	private $dir = 'Controlqtime\Core\Factory\\';

	public function build($type, $id, $repoId, $file = null, $pathImgDelete = null)
	{
		$class       = 'Image' . $type;
		$targetClass = $this->dir . $class;

		if ( ! class_exists($targetClass) )
		{
			throw new Exception('Invalid class name');
		}

		return new $targetClass($id, $repoId, $type, $file, $class, $pathImgDelete);
	}

}