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
	
	
}