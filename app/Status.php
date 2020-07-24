<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = 'id_status';

    public function homepage(){
    	return $this->hasMany(HomePage::class);
    }
}
