<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\RelationshipRepoInterface;

class RelationshipRepo extends BaseRepo implements RelationshipRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Relationship
	 */
	protected $model;
	
	/**
	 * RelationshipRepo constructor.
	 *
	 * @param Relationship $model
	 */
	public function __construct(Relationship $model)
	{
		$this->model = $model;
	}
	
}