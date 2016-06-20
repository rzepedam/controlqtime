<?php 

namespace Controlqtime\Core\Repositories\Base;

use Controlqtime\Core\Contracts\Base\BaseRepoInterface;
use Illuminate\Support\Facades\Session;

abstract class BaseRepo implements BaseRepoInterface
{
    public function allJson(array $with = array())
    {
        return $this->model->with($with)->get()->toJson();
    }

    public function all(array $with = array())
    {
        return $this->model->with($with)->get();
    }
    
    public function find($id, array $with = array())
    {
        return $this->model->with($with)->findOrFail($id);
    }

    public function create(array $request)
    {
        $query = $this->model->create($request);
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return $query;
    }

    public function update(array $request, $id)
    {
        $query = $this->model->findOrFail($id)->fill($request)->save();
        Session::flash('success', 'El registro fue actualizado satisfactoriamente.');
        return $query;
    }

    public function delete($id)
    {
        $query = $this->model->destroy($id);
        Session::flash('success', 'El registro fue eliminado satisfactoriamente.');
        return $query;
    }
    
}