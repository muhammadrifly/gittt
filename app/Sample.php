<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'samples';
   
    protected $fillable = ['anggota_id', 'id_subkriteria','values'];
}
