<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function perkuliahan()
   {
       $mahasiswa = Mahasiswa::get();
       return view('admin.perkuliahan', ['mahasiswa' => $mahasiswa]);
    //    return $mahasiswa;
   }

   public function mhsPage()
   {
    $data = [
        'mahasiswa' => Mahasiswa::get(),
    ];

    return view('admin.v_mhs', $data);
   }
   public function dosenPage()
   {
    $data = [
        'dosen' => Dosen::get(),
    ];

    return view('admin.v_dosen', $data);
   }
}
