<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Traits\WhereMethodsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Speciality extends Eloquent
{
	use SoftDeletes, OperationEntityArray, WhereMethodsTrait, DestroyImageFile;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'type_speciality_id', 'institution_speciality_id', 'emission_speciality', 'expired_speciality'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'emission_speciality', 'expired_speciality', 'deleted_at'
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
	public function typeSpeciality()
	{
		return $this->belongsTo(TypeSpeciality::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function institution()
	{
		return $this->belongsTo(Institution::class, 'institution_speciality_id');
	}
	
	
	/**
	 * @param string $value (01-01-2010)
	 */
	public function setEmissionSpecialityAttribute($value)
	{
		$this->attributes['emission_speciality'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param string $value (01-01-2010)
	 */
	public function setExpiredSpecialityAttribute($value)
	{
		$this->attributes['expired_speciality'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_specialities']; $i++)
		{
			
			$id = $request['id_speciality'][$i];
			
			if ($id == 0)
			{
				$this->model = new Speciality([
					'type_speciality_id'        => $request['type_speciality_id'][$i],
					'institution_speciality_id' => $request['institution_speciality_id'][$i],
					'emission_speciality'       => $request['emission_speciality'][$i],
					'expired_speciality'        => $request['expired_speciality'][$i],
				]);
				
				$entity->certifications()->save($this->model);
				$entity->state = 'disable';
				$entity->save();
				
			} else
			{
				$this->model                            = $this->model->findOrFail($id);
				$this->model->type_speciality_id        = $request['type_speciality_id'][$i];
				$this->model->institution_speciality_id = $request['institution_speciality_id'][$i];
				$this->model->emission_speciality       = $request['emission_speciality'][$i];
				$this->model->expired_speciality        = $request['expired_speciality'][$i];
				
				$this->model->save();
			}
		}
	}
}
