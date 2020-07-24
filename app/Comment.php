<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'id_komentar';

    protected $fillable = ['id_user','isi_komentar','id_home','created_at','updated_at'];
    }
