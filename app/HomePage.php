<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{ 	
    protected $primaryKey = 'id_home';
    protected $fillable = ['judul','gambar','waktu_upload','id_uploader','id_status','isi_berita','alamat_maps','banyak_komentar'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
