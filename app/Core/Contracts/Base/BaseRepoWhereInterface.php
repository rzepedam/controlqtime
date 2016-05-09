<?php

namespace Controlqtime\Core\Contracts\Base;

interface BaseRepoWhereInterface
{
    public function whereFirst($attribute, $value, $columns = array('*'));

    public function whereLists($attribute, $value, $column);
}