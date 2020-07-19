<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    public $table='kriterias';
    protected $primaryKey ='id_kriteria';
   
    protected $fillable = ['nama_kriteria','persentase','secondary_factor','core_factor'];


    public function subKriterias()
    {
    	return $this->hasMany(subKriteria::class);
    }

}
