<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TypeExamRepoInterface;

class TypeExamRepo extends BaseRepo implements TypeExamRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var TypeExam
	 */
	protected $model;
	
	/**
	 * TypeExamRepo constructor.
	 *
	 * @param TypeExam $model
	 */
	public function __construct(TypeExam $model)
	{
		$this->model = $model;
	}
	
}