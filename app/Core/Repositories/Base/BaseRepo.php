<?php 

namespace Controlqtime\Core\Repositories\Base;

use Controlqtime\Core\Contracts\Base\BaseRepoInterface;
use Illuminate\Support\Facades\Session;

abstract class BaseRepo implements BaseRepoInterface
{
    /*public function make(array $with = array())
    {
        return $this->model->with($with);
    }*/
    
    public function all(array $with = array())
    {
        //$query = $this->make($with);
        return $this->model->with($with)->orderBy('id', 'DESC')->paginate();
    }
    
    public function find($id, array $with = array())
    {
        //$query = $this->make($with);
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
        Session::flash('success', 'El registro fue actualizado satisfactoriamente.');
        return $this->model->findOrFail($id)->fill($request)->save();
    }

    public function delete($id)
    {
        $query = $this->model->destroy($id);
        Session::flash('success', 'El registro fue eliminado satisfactoriamente.');
        return $query;
    }
}