<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	protected $fillable = [
		'name', 'terminal_id'
	];

	public $timestamps = false;

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty(trim($not_space_name))) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }

    public function terminal() {
        return $this->belongsTo(Terminal::class);
    }

    public function companies() {
        return $this->belongsToMany('App\Company');
    }

}
