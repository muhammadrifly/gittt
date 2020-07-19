<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalonAnggota extends Model
{
    public $table='data_calonanggota';
    protected $primaryKey = 'id';

    protected $fillable = ['nim','nama_calonanggota','jurusan','email_calonanggota','nomor_telp','password'];

}
