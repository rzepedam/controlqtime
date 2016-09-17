<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TerminalRepoInterface;

class TerminalRepo extends BaseRepo implements TerminalRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var Terminal
	 */
	protected $model;
	
	/**
	 * TerminalRepo constructor.
	 *
	 * @param Terminal $model
	 */
	public function __construct(Terminal $model)
	{
		$this->model = $model;
	}
	
}