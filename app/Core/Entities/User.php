<?php

namespace Controlqtime\Core\Entities;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use HasApiTokens, Notifiable, SoftDeletes;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email', 'password',
	];
	
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
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
	 * Route notifications for the Slack channel.
	 *
	 * @return string
	 */
	public function routeNotificationForSlack()
	{
		return config('services.slack.url');
	}
	
	/**
	 * Route notifications for the Nexmo channel.
	 *
	 * @return string
	 */
	public function routeNotificationForNexmo()
	{
		return $this->employee->address->phone1;
	}
	
}
