<?php 

namespace Controlqtime\Core\Repositories;

abstract class BaseRepo
{
    /**
     * Return all with name used in Search bar
     * 
     * @param $request
     * 
     * @return mixed
     */
    public function all($request)
    {
        return $this->model->name($request->get('table_search'))->orderBy('name')->paginate(20);
    }


    /**
     * Return element with specific id
     * 
     * @param $id
     * 
     * @return mixed
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }
}