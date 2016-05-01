<?php 

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\BaseRepoInterface;

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
        return $this->model->create($request);
    }

    public function update(array $request, $id)
    {
        return $this->model->findOrFail($id)->fill($request)->save();
    }

    public function delete($id)
    {
        $this->model->destroy($id);
    }
}