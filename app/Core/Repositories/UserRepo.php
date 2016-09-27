<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\User;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\UserRepoInterface;

class UserRepo extends BaseRepo implements UserRepoInterface
{
	/**
	 * @var User
	 */
	protected $model;
	
	/**
	 * UserRepo constructor.
	 *
	 * @param User $model
	 */
	public function __construct(User $model)
	{
		$this->model = $model;
	}
}