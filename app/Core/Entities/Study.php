<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Controlqtime\Core\Traits\OperationEntityArray;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Study extends Eloquent
{
	use SoftDeletes, SoftCascadeTrait, OperationEntityArray;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'degree_id', 'date_obtention'
	];
	
	/**
	 * @var array
	 */
	protected $softCascade = [];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'date_obtention', 'deleted_at'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function degree()
	{
		return $this->belongsTo(Degree::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function detailCollegeStudy()
	{
		return $this->hasOne(DetailCollegeStudy::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function detailSchoolStudy()
	{
		return $this->hasOne(DetailSchoolStudy::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function detailTechnicalStudy()
	{
		return $this->hasOne(DetailTechnicalStudy::class);
	}
	
	
	public function getTypeDegreeIdAttribute()
	{
		switch ( $this->degree_id )
		{
			case 1:
			case 2:
				$type = 'school';
				break;
			case 3:
				$type = 'technical';
				break;
			default:
				$type = 'college';
				break;
		}
		
		return $type;
	}
	
	/**
	 * @param string $value (01-01-2010)
	 */
	public function setDateObtentionAttribute($value)
	{
		$this->attributes['date_obtention'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_studies']; $i++)
		{
			$id = $request['id_study'][$i];
			
			if ($id == 0)
			{
				$study = $this->model->create([
					'employee_id'    => $entity->id,
					'degree_id'      => $request['degree_id'][$i],
					'date_obtention' => $request['date_obtention'][$i]
				]);
				
				switch ($request['degree_id'][$i])
				{
					case 1:
					case 2:
						$study->detailSchoolStudy()->create([
							'name_institution' => $request['name_institution'][$i]
						]);
						break;
					
					case 3:
						$study->detailTechnicalStudy()->create([
							'name_study'       => $request['name_study'][$i],
							'name_institution' => $request['name_institution'][$i]
						]);
						break;
					
					case 4:
					case 5:
					case 6:
					case 7:
					case 8:
						$study->detailCollegeStudy()->create([
							'name_study'           => $request['name_study'][$i],
							'institution_study_id' => $request['institution_study_id'][$i]
						]);
						break;
				}
				
			} else
			{
				$this->model                 = $this->model->findOrFail($id);
				$this->model->degree_id      = $request['degree_id'][$i];
				$this->model->date_obtention = $request['date_obtention'][$i];
				
				switch ($request['degree_id'][$i])
				{
					case 1:
					case 2:
						$this->model->detailSchoolStudy()->update([
							'name_institution' => $request['name_institution'][$i]
						]);
						break;
					
					case 3:
						$this->model->detailTechnicalStudy()->update([
							'name_study'       => $request['name_study'][$i],
							'name_institution' => $request['name_institution'][$i]
						]);
						break;
					
					case 4:
					case 5:
					case 6:
					case 7:
					case 8:
						$this->model->detailCollegeStudy()->update([
							'name_study'           => $request['name_study'][$i],
							'institution_study_id' => $request['institution_study_id'][$i]
						]);
						break;
				}
				
				$this->model->save();
			}
		}
	}
}
