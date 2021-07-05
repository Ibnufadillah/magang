<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = "mata_kuliah";
    protected $fillable = ['nama','sks'];

    public function mahasiswa()
    {
    	return $this->belongsToMany(Mahasiswa::class);
    }

    public function dosen(){
    	return $this->belongsTo(Dosen::class);
    }

    public function getMatkulID()
   {
       return sprintf('MK%03d', $this->id);
   }
}
