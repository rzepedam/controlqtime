<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Traits\OperationEntityArray;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Certification extends Eloquent
{
	use SoftDeletes, OperationEntityArray, DestroyImageFile;
	
    /**
     * @var array
     */
    protected $fillable = [
        'type_certification_id', 'institution_certification_id', 'emission_certification', 'expired_certification'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'emission_certification', 'expired_certification', 'deleted_at'
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
    public function typeCertification()
    {
        return $this->belongsTo(TypeCertification::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_certification_id');
    }

    /**
     * @param string $value (01-01-2010)
     */
    public function setEmissionCertificationAttribute($value)
    {
        $this->attributes['emission_certification'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (01-01-2010)
     */
    public function setExpiredCertificationAttribute($value)
    {
        $this->attributes['expired_certification'] = Carbon::createFromFormat('d-m-Y', $value);
    }
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_certifications']; $i++)
		{
			$id = $request['id_certification'][$i];
			
			if ($id == 0)
			{
				$this->model = new Certification([
					'type_certification_id'        => $request['type_certification_id'][$i],
					'institution_certification_id' => $request['institution_certification_id'][$i],
					'emission_certification'       => $request['emission_certification'][$i],
					'expired_certification'        => $request['expired_certification'][$i],
				]);
				
				$entity->certifications()->save($this->model);
				$entity->state = 'disable';
				$entity->save();
				
			} else
			{
				$this->model                               = $this->model->find($id);
				$this->model->type_certification_id        = $request['type_certification_id'][$i];
				$this->model->institution_certification_id = $request['institution_certification_id'][$i];
				$this->model->emission_certification       = $request['emission_certification'][$i];
				$this->model->expired_certification        = $request['expired_certification'][$i];
				
				$this->model->save();
			}
		}
	}
}
