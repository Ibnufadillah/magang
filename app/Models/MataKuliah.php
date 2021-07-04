<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = "mata_kuliah";
 
    public function mahasiswa()
    {
    	return $this->belongsToMany(Mahasiswa::class);
    }

    public function dosen(){
    	return $this->belongsTo(Dosen::class);
    }
}
