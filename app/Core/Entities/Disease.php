<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Traits\OperationEntityArray;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Disease extends Eloquent
{
	use SoftDeletes, OperationEntityArray, DestroyImageFile;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'type_disease_id', 'treatment_disease', 'detail_disease'
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
	public function typeDisease()
	{
		return $this->belongsTo(TypeDisease::class);
	}
	
	/**
	 * @param string $value
	 */
	public function setDetailDiseaseAttribute($value)
	{
		$this->attributes['detail_disease'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_diseases']; $i++)
		{
			
			$id = $request['id_disease'][$i];
			
			if ($id == 0)
			{
				$this->model = new Disease([
					'type_disease_id'   => $request['type_disease_id'][$i],
					'treatment_disease' => $request['treatment_disease' . $i],
					'detail_disease'    => $request['detail_disease'][$i],
				]);
				
				$entity->studies()->save($this->model);
				
			} else
			{
				$this->model                    = $this->model->find($id);
				$this->model->type_disease_id   = $request['type_disease_id'][$i];
				$this->model->treatment_disease = $request['treatment_disease' . $i];
				$this->model->detail_disease    = $request['detail_disease'][$i];
				
				$this->model->save();
			}
		}
	}
}
