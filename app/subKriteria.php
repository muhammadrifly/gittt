<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subKriteria extends Model
{
    public $table='sub_kriterias';
    protected $primaryKey = 'id_subkriteria';
    
    protected $fillable = ['nama_subkriteria','id_kriteria','target','type'];

    public function kriteria()
    {
    	return $this->belongsTo(Kriteria::class);
    }


}
