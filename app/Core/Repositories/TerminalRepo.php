<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TerminalRepoInterface;
use Controlqtime\Core\Entities\Terminal;

class TerminalRepo extends BaseRepoWithLists implements TerminalRepoInterface
{
    protected $model;

    public function __construct(Terminal $model)
    {
        $this->model = $model;
    }
    
}