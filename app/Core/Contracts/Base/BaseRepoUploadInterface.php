<?php

namespace Controlqtime\Core\Contracts\Base;

interface BaseRepoUploadInterface
{
    public function getPath($repo, $id, $type);

    public function randName($ext);

    public function moveImage($path, $file, $name);

    public function addImages($repo, $file, $id, $type);

    public function destroyImage($repo, $id, $type, $name);

    public function delete($id);
}