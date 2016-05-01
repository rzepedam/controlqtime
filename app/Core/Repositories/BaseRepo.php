<?php 

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Illuminate\Support\Facades\Session;

abstract class BaseRepo implements BaseRepoInterface
{
    public function all()
    {
        return $this->model->orderBy('id', 'DESC')->paginate();
    }
    
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $request)
    {
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return $this->model->create($request);
    }

    public function update(array $request, $id)
    {
        Session::flash('success', 'El registro fue actualizado satisfactoriamente.');
        return $this->model->findOrFail($id)->fill($request)->save();
    }

    public function delete($id)
    {
        Session::flash('success', 'El registro fue eliminado satisfactoriamente.');
        return $this->model->destroy($id);
    }
}