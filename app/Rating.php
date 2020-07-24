<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $primaryKey = 'id_rating';
    protected $fillable = [
    	'created_at', 'updated_at','jumlah','id_home','id_user'
    ];
}
