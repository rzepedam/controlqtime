<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Traits\OperationEntityArray;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Exam extends Eloquent
{
	use OperationEntityArray, DestroyImageFile, SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'type_exam_id', 'emission_exam', 'expired_exam', 'detail_exam'
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
	public function typeExam()
	{
		return $this->belongsTo(TypeExam::class);
	}
	
	
	/**
	 * @param string $value
	 */
	public function setEmissionExamAttribute($value)
	{
		$this->attributes['emission_exam'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param string $value
	 */
	public function setExpiredExamAttribute($value)
	{
		$this->attributes['expired_exam'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param string $value
	 */
	public function setDetailExamAttribute($value)
	{
		$this->attributes['detail_exam'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_exams']; $i++)
		{
			$id = $request['id_exam'][$i];
			
			if ($id == 0)
			{
				$this->model = new Exam([
					'type_exam_id'  => $request['type_exam_id'][$i],
					'emission_exam' => $request['emission_exam'][$i],
					'expired_exam'  => $request['expired_exam'][$i],
					'detail_exam'   => $request['detail_exam'][$i],
				]);
				
				$entity->exams()->save($this->model);
				
			} else
			{
				$this->model                = $this->model->find($id);
				$this->model->type_exam_id  = $request['type_exam_id'][$i];
				$this->model->emission_exam = $request['emission_exam'][$i];
				$this->model->expired_exam  = $request['expired_exam'][$i];
				$this->model->detail_exam   = $request['detail_exam'][$i];
				
				$this->model->save();
			}
		}
	}
	
}
