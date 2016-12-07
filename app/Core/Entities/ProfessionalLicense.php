<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Traits\OperationEntityArray;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfessionalLicense extends Eloquent
{
	use SoftDeletes, OperationEntityArray, DestroyImageFile;
	
    /**
     * @var array
     */
    protected $fillable = [
        'type_professional_license_id', 'emission_license', 'expired_license', 'is_donor', 'detail_license'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'expired_license', 'emission_license', 'deleted_at'
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
    public function typeProfessionalLicense()
    {
        return $this->belongsTo(TypeProfessionalLicense::class);
    }

    
    /**
     * @param string $value (01-01-2010)
     */
    public function setEmissionLicenseAttribute($value)
    {
        $this->attributes['emission_license'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (01-01-2010)
     */
    public function setExpiredLicenseAttribute($value)
    {
        $this->attributes['expired_license'] = Carbon::createFromFormat('d-m-Y', $value);
    }
	
	/**
	 * @param string $value
	 */
	public function setDetailLicenseAttribute($value)
    {
        $this->attributes['detail_license'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_professional_licenses']; $i++)
		{
			$id = $request['id_professional_license'][$i];
			
			if ($id == 0)
			{
				$this->model = new ProfessionalLicense([
					'type_professional_license_id' => $request['type_professional_license_id'][$i],
					'emission_license'             => $request['emission_license'][$i],
					'expired_license'              => $request['expired_license'][$i],
					'is_donor'                     => $request['is_donor' . $i],
					'detail_license'               => $request['detail_license'][$i],
				]);
				
				$entity->professionalLicenses()->save($this->model);
				$entity->state = 'disable';
				$entity->save();
				
			} else
			{
				$this->model                               = $this->model->find($id);
				$this->model->type_professional_license_id = $request['type_professional_license_id'][$i];
				$this->model->emission_license             = $request['emission_license'][$i];
				$this->model->expired_license              = $request['expired_license'][$i];
				$this->model->is_donor                     = $request['is_donor' . $i];
				$this->model->detail_license               = $request['detail_license'][$i];
				
				$this->model->save();
			}
		}
	}
}
