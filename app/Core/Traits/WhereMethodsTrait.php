<?php

namespace Controlqtime\Core\Traits;

trait WhereMethodsTrait
{
	/**
	 * @param $attribute
	 * @param $value
	 * @param array $columns
	 *
	 * @return mixed
	 */
	public function whereFirst($attribute, $value, $columns = ['*'])
	{
		return $this->model->where($attribute, '=', $value)->first($columns);
	}
	
	/**
	 * @param $attribute
	 * @param $value
	 * @param array $with
	 * @param array $columns
	 *
	 * @return mixed
	 */
	public function whereDate($attribute, $value, $with = ['*'], $columns = ['*'])
	{
		return $this->model->with($with)->whereDate($attribute, '=', $value)->get($columns);
	}
	
	/**
	 * @param $attribute
	 * @param $value
	 * @param $column
	 *
	 * @return mixed
	 */
	public function whereLists($attribute, $value, $column)
	{
		return $this->model->where($attribute, '=', $value)->pluck($column, 'id');
	}
	
	/**
	 * @param $value
	 * @param array $columns
	 *
	 * @return mixed
	 */
	public function whereIn($value, $columns = ['*'])
	{
		$id = explode(",", $value);
		
		return $this->model->whereIn('id', $id)->get($columns);
	}
	
	
	/**
	 * @param $columnDate
	 * @param $valueDate
	 * @param $column
	 * @param $valueColumn
	 * @param array $with
	 * @param array $columns
	 *
	 * @return mixed
	 */
	public function whereDateAndWhereColumn($columnDate, $valueDate, $column, $valueColumn, $with = ['*'], $columns = ['*'])
	{
		return $this->model->with($with)->whereDate($columnDate, $valueDate)->where($column, $valueColumn)->get($columns);
	}
	
}