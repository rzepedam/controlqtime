<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ContactEmployee extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'contactsable_id', 'contactsable_type', 'contact_relationship_id', 'name_contact',
		'email_contact', 'address_contact', 'tel_contact'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function contactsable()
	{
		return $this->morphTo();
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
		return $this->belongsTo(Relationship::class, 'contact_relationship_id')
			->withTrashed();
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
}
