<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ContactEmployee extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'contact_relationship_id', 'name_contact', 'email_contact', 'address_contact', 'tel_contact'
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
        $this->attributes['name_contact'] = ucfirst(mb_strtolower($value, 'UTF-8'));
    }

    /**
     * @param string $value
     */
    public function setEmailContactAttribute($value)
    {
        $this->attributes['email_contact'] = strtolower($value);
    }

    /**
     * @param string $value
     */
    public function setAddressContactAttribute($value)
    {
        $this->attributes['address_contact'] = ucfirst($value);
    }

}
