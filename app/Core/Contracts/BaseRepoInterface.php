<?php namespace Controlqtime\Core\Contracts;

interface BaseRepoInterface {

    public function all();

    public function find($id);

    public function create(array $request);

    public function update(array $request, $id);

    public function delete($id);

}