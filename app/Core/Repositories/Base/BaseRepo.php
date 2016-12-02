<?php

namespace Controlqtime\Core\Repositories\Base;

use Exception;
use Illuminate\Support\Facades\Session;
use Controlqtime\Core\Contracts\Base\BaseRepoInterface;

abstract class BaseRepo implements BaseRepoInterface
{
	/**
	 * @param array $with
	 *
	 * @return mixed
	 */
	public function all(array $with = [])
	{
		return $this->model->with($with)->get();
	}
	
	/**
	 * @param $id
	 * @param array $with
	 *
	 * @return mixed
	 */
	public function find($id, array $with = [])
	{
		return $this->model->with($with)->findOrFail($id);
	}
	
	/**
	 * @param array $request
	 *
	 * @return mixed
	 */
	public function create(array $request)
	{
		$query = $this->model->create($request);
		Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
		
		return $query;
	}
	
	/**
	 * @param array $request
	 * @param $id
	 *
	 * @return mixed
	 */
	public function update(array $request, $id)
	{
		$model = $this->model->findOrFail($id);
		$model->fill($request)->saveOrFail();
		Session::flash('success', 'El registro fue actualizado satisfactoriamente.');
		
		return $model;
	}
	
	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function delete($id)
	{
		$query = $this->model->destroy($id);
		Session::flash('success', 'El registro fue eliminado satisfactoriamente.');
		
		return $query;
	}
	
}