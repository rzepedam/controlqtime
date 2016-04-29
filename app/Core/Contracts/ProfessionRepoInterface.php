<?php namespace Controlqtime\Core\Contracts;


interface ProfessionRepoInterface {

    public function all($request);

    public function findOrFail($id);

}