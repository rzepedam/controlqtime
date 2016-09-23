<?php

namespace Controlqtime\Core\Contracts\Base;

interface BaseRepoInterface {

    public function all(array $with = array());

    public function find($id, array $with = array());

    public function create(array $request);

    public function update(array $request, $id);

    public function delete($id);

}