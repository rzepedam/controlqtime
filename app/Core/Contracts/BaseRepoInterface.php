<?php namespace Controlqtime\Core\Contracts;

interface BaseRepoInterface {

    public function make(array $with = array());

    public function all(array $with = array());

    public function find($id, array $with = array());

    public function create(array $request);

    public function update(array $request, $id);

    public function delete($id);

}