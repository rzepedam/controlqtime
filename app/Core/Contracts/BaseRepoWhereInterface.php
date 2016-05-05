<?php

namespace Controlqtime\Core\Contracts;

interface BaseRepoWhereInterface
{
    public function whereFirst($attribute, $value, $columns = array('*'));
}