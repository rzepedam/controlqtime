<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Terminal;

class TerminalRepo extends BaseRepo
{
    protected $model;

    public function __construct(Terminal $model)
    {
        $this->model = $model;
    }
}