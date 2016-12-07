<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Controlqtime\Core\Traits\WhereMethodsTrait;
use Controlqtime\Core\Traits\OperationEntityArray;
use Illuminate\Database\Eloquent\Model as Eloquent;

class ContactEmployee extends Eloquent
{
	use SoftDeletes, OperationEntityArray, WhereMethodsTrait;
	
    /**
     * @var array
     */
    protected $fillable = [
        'contact_relationship_id', 'name_contact', 'email_contact', 'address_contact', 'tel_contact'
    ];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	
	
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
        return $this->belongsTo(Relationship::class, 'contact_relationship_id');
    }

    /**
     * @param string $value
     */
    public function setNameContactAttribute($value)
    {
        $this->attributes['name_contact'] = ucwords(mb_strtolower($value, 'UTF-8'));
    }

    /**
     * @param string $value
     */
    public function setEmailContactAttribute($value)
    {
        $this->attributes['email_contact'] = mb_strtolower($value, 'utf-8');
    }

    /**
     * @param string $value
     */
    public function setAddressContactAttribute($value)
    {
        $this->attributes['address_contact'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_contacts']; $i++)
		{
			$id = $request['id_contact'][$i];
			
			if ($id == 0)
			{
				$this->model = new ContactEmployee([
					'contact_relationship_id' => $request['contact_relationship_id'][$i],
					'name_contact'            => $request['name_contact'][$i],
					'email_contact'           => $request['email_contact'][$i],
					'address_contact'         => $request['address_contact'][$i],
					'tel_contact'             => $request['tel_contact'][$i],
				]);
				
				$entity->contactEmployees()->save($this->model);
				
			} else
			{
				$this->model                          = $this->model->find($id);
				$this->model->contact_relationship_id = $request['contact_relationship_id'][$i];
				$this->model->name_contact            = $request['name_contact'][$i];
				$this->model->email_contact           = $request['email_contact'][$i];
				$this->model->address_contact         = $request['address_contact'][$i];
				$this->model->tel_contact             = $request['tel_contact'][$i];
				
				$this->model->save();
			}
		}
	}
}
