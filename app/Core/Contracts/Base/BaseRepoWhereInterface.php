<?php

namespace Controlqtime\Core\Contracts\Base;

interface BaseRepoWhereInterface
{
    public function whereFirst($attribute, $value, $columns = ['*']);

    public function whereLists($attribute, $value, $column);
	
	public function whereIn($value, $columns = ['*']);
	
	public function whereDate($attribute, $value, $with = ['*'], $columns = ['*']);
	
	public function whereDateAndWhereColumn($columnDate, $valueDate, $column, $valueColumn, $with = ['*'], $columns = ['*']);
}