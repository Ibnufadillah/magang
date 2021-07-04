<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = "dosen";
    protected $fillable = ['nama','alamat', 'tgl_lahir','tmp_lahir'];

    public function getDosenID()
   {
       return sprintf('D%03d', $this->id);
   }
    public function getID()
   {
       return $this->id;
   }

    public function mata_kuliah(){
    	return $this->hasMany(MataKuliah::class);
    }

    public function user(){
    	return $this->hasOne(User::class);
    }

}
