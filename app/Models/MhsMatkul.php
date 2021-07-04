<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MhsMatkul extends Model
{
    use HasFactory;

    protected $table = "mahasiswa_mata_kuliah";
    protected $fillable = ['id','mahasiswa_id', 'mata_kuliah_id'];

    public function getMhsMKID()
   {
       return $this->id;
   }
}
