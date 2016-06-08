<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TerminalRepoInterface;
use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TerminalRepo extends BaseRepo implements TerminalRepoInterface
{
    use ListsTrait;

    protected $model;

    public function __construct(Terminal $model)
    {
        $this->model = $model;
    }
    
}