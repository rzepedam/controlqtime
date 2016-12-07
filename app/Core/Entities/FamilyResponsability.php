<?php

namespace Controlqtime\Core\Entities;

use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\SoftDeletes;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Traits\OperationEntityArray;
use Illuminate\Database\Eloquent\Model as Eloquent;

class FamilyResponsability extends Eloquent
{
	use SoftDeletes, OperationEntityArray, DestroyImageFile;
	
    /**
     * @var array
     */
    protected $fillable = [
        'name_responsability', 'rut_responsability', 'relationship_id'
    ];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'emission_exam', 'expired_exam', 'deleted_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function imagesable()
	{
		return $this->morphMany(Image::class, 'imagesable');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }
	
    
	/**
	 * @param string $value
	 */
	public function setNameResponsabilityAttribute($value)
	{
		$this->attributes['name_responsability'] = ucwords(mb_strtolower($value, 'UTF-8'));
	}
    
    /**
     * @param string $value format 12.345.678-9
     */
    public function setRutResponsabilityAttribute($value)
    {
        $this->attributes['rut_responsability'] = str_replace('.', '', $value);
    }


    /**
     * @param string $value format 12345678-9
     *
     * @return string 12.345.678-9
     */
    public function getRutResponsabilityAttribute($value)
    {
        return FormatField::rut($value);
    }
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_family_responsabilities']; $i++)
		{
			$id = $request['id_family_responsability'][$i];
			
			if ($id == 0)
			{
				$this->model = new FamilyResponsability([
					'name_responsability' => $request['name_responsability'][$i],
					'rut_responsability'  => $request['rut_responsability'][$i],
					'relationship_id'     => $request['relationship_id'][$i],
				]);
				
				$entity->familyResponsabilities()->save($this->model);
				
			} else
			{
				$this->model                      = $this->model->find($id);
				$this->model->name_responsability = $request['name_responsability'][$i];
				$this->model->rut_responsability  = $request['rut_responsability'][$i];
				$this->model->relationship_id     = $request['relationship_id'][$i];
				
				$this->model->save();
			}
		}
	}
}
