<?php

namespace Controlqtime\Core\Factory;

use DB;
use Exception;
use Illuminate\Support\Str;
use Controlqtime\Core\Entities\Image;
use Illuminate\Support\Facades\Storage;

class ImageFactory
{
    /**
     * @var string
     */
    protected $dirEntity = 'Controlqtime\Core\Entities\\';

    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $repoId;

    /**
     * @var
     */
    protected $repo;

    /**
     * @var
     */
    protected $type;

    /**
     * @var
     */
    protected $file;

    /**
     * @var
     */
    protected $model;

    /**
     * @var
     */
    protected $entity;

    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $pathImgDelete;

    /**
     * @var name
     *           subClass
     *           or
     *           null
     */
    protected $subClass;

    public function __construct($id, $repo, $repoId, $class, $file = null, $pathImgDelete = null, $subClass = null)
    {
        $this->id = $id.'/';
        $this->repo = $repo;
        $this->repoId = $repoId.'/';
        $this->type = $class.'/';
        $this->file = $file;
        $this->subClass = $subClass;
        $this->model = $this->dirEntity.$class;
        $this->entity = new $this->model();
        $this->pathImgDelete = $pathImgDelete;
        $method = is_null($pathImgDelete) ? 'addImages' : 'destroyImage';
        $this->$method();
    }

    public function addImages()
    {
        DB::beginTransaction();

        try {
            ($this->repoId === '/') ? $this->addImagesWithClassEmployeeVehicleAndCompany() : $this->addImagesWithSubClass();
            
            $this->moveImage();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return true;
    }

    // Employees, Vehicles, Companies
    public function addImagesWithClassEmployeeVehicleAndCompany()
    {
        $this->name = $this->getName();
        $model = $this->entity->findOrFail($this->id);

        $model->imageable()->create([
            'path'      => $this->getPath().$this->name,
            'orig_name' => $this->name,
            'size'      => $this->file->getSize(),
        ]);
    }

    // Certification, Specialty, Professional Licenses, Disabilities, Diseases,
    // Exams, Family Responsabilities
    public function addImagesWithSubClass()
    {
        $this->name = $this->getName();
        $model = $this->entity->findOrFail($this->repoId);

        $model->imageable()->create([
            'path'      => $this->getPath().$this->name,
            'orig_name' => $this->name,
            'size'      => $this->file->getSize(),
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return time().Str::random(15).'.'.$this->file->getClientOriginalExtension();
    }

    /**
     * @return mixed save
     *               files
     *               in
     *               S3
     *               server
     */
    public function moveImage()
    {
        return $this->file->storeAs($this->getPath(), $this->name, 's3');
    }

    /**
     * @return string
     */
    public function getPath()
    {
        $path = is_null($this->subClass) ? ($this->repo.$this->id.$this->type.$this->repoId) : ($this->repo.$this->id.$this->subClass);

        return $path;
    }

    /**
     * @return bool
     */
    public function destroyImage()
    {
        DB::beginTransaction();

        try {
            $this->id = str_replace('/', '', $this->id);
            $image = new Image();
            $img = $image->findOrFail($this->id);
            if ($img->delete()) {
                Storage::disk('s3')->delete($img->path);
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollback();
        }

        return true;
    }
}
