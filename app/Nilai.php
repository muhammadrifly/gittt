<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilais';
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['selisih', 'nilai','keterangan'];
}
