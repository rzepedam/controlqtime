<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Traits\OperationEntityArray;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Disability extends Eloquent
{
	use SoftDeletes, OperationEntityArray, DestroyImageFile;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'type_disability_id', 'treatment_disability', 'detail_disability'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
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
	public function typeDisability()
	{
		return $this->belongsTo(TypeDisability::class);
	}
	
	
	/**
	 * @param string $value
	 */
	public function setDetailDisabilityAttribute($value)
	{
		$this->attributes['detail_disability'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_disabilities']; $i++)
		{
			
			$id = $request['id_disability'][$i];
			
			if ($id == 0)
			{
				$this->model = new Disability([
					'type_disability_id'   => $request['type_disability_id'][$i],
					'treatment_disability' => $request['treatment_disability' . $i],
					'detail_disability'    => $request['detail_disability'][$i],
				]);
				
				$entity->studies()->save($this->model);
				
			} else
			{
				$this->model                       = $this->model->find($id);
				$this->model->type_disability_id   = $request['type_disability_id'][$i];
				$this->model->treatment_disability = $request['treatment_disability' . $i];
				$this->model->detail_disability    = $request['detail_disability'][$i];
				
				$this->model->save();
			}
		}
	}
}
