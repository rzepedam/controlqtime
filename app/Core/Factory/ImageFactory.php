<?php

namespace Controlqtime\Core\Factory;

use Exception;
use Controlqtime\Core\Contracts\ImageFactoryInterface;

class ImageFactory implements ImageFactoryInterface
{
	/**
	 * @var string
	 */
	private $dir = 'Controlqtime\Core\Factory\\';
	
	/**
	 * @param $type
	 * @param $id
	 * @param $repoId
	 * @param null $file
	 * @param null $pathImgDelete
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function build($type, $id, $repoId, $file = null, $pathImgDelete = null)
	{
		$class       = 'Image' . $type;
		$targetClass = $this->dir . $class;
		
		if (!class_exists($targetClass))
		{
			throw new Exception('Invalid class name');
		}
		
		return new $targetClass($id, $repoId, $type, $file, $class, $pathImgDelete);
	}
	
}