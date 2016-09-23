<?php

namespace Controlqtime\Core\Contracts\Base;

interface BaseRepoUploadInterface
{
    public function getPath($repo, $id, $type, $file_id);

    public function moveImage($path, $file, $name);

    public function addImages($repo, $file, $id, $type, $subRepoId = null);

    public function destroyImage($path);

    public function delete($id);
}