<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";
    protected $fillable = ['nama','alamat', 'tgl_lahir','tmp_lahir'];
 
    public function mata_kuliah()
    {
    	return $this->belongsToMany(MataKuliah::class);
    }
}
