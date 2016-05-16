<?php

namespace Controlqtime\Core\Repositories\Base;

use Controlqtime\Core\Contracts\Base\BaseRepoUploadInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BaseUploadRepo implements BaseRepoUploadInterface
{
    public function getPath($repo, $id, $type)
    {
        return $path = public_path() . "/storage/" . $repo . "/" . $id . "/" . $type . "/";
    }

    public function randName($ext)
    {
        return Str::random(20) . '.' . $ext;
    }

    public function moveImage($path, $file, $name)
    {
        File::makeDirectory($path, $mode = 0777, true, true);
        $file->move($path, $name);
    }

    public function addImages($repo, $file, $id, $type)
    {
        $path = $this->getPath($repo, $id, $type);
        $name = $this->randName($file->getClientOriginalExtension());
        $this->model->name          = $name;
        $this->model->mime          = $file->getClientOriginalExtension();
        $this->model->orig_name     = $file->getClientOriginalName();

        switch ($repo)
        {
            case 'company':
                $this->model->company_id    = $id;
                break;

            case 'vehicle':
                $this->model->vehicle_id    = $id;
                break;
        }

        if ($this->model->save()) {
            $this->moveImage($path, $file, $name);
            return true;
        }
    }
    
    public function destroyImage($repo, $id, $type, $name)
    {
        $path   = $this->getPath($repo, $id, $type) . $name;

        if (is_file($path)) {
            unlink($path);
            return true;
        }
    }

    public function delete($id)
    {
        $this->model->destroy($id);
    }
    
}