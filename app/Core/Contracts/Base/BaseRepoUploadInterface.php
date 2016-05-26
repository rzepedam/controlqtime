<?php

namespace Controlqtime\Core\Contracts\Base;

interface BaseRepoUploadInterface
{
    public function getPath($repo, $id, $type);

    public function moveImage($path, $file, $name);

    public function addImages($repo, $file, $id, $type);

    public function destroyImage($path);

    public function delete($id);
}