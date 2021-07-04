<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this -> Mahasiswa = new Mahasiswa();
    }

    public function index(){
    	 return view('v_home');
   }

//    public function anggotapage()
//    {
//        $anggota = Anggota::get();
//        return view('v_anggota', ['anggota' => $anggota]);
//    }
    public function detail($id){

        $data = [
            'mahasiswa' => Mahasiswa::find($id),
        ];
        return view('mhs.v_profile', $data);
    }

    public function matkul(){
        $id = 17;
        $data = [
            'mata_kuliah' => MataKuliah::get(),
            'mahasiswa' => Mahasiswa::find($id),
        ];
        return view('mhs.v_matkul', $data);
        // return $data;
    }
    public function perkuliahan($id){

        $data = [
            'mahasiswa' => Mahasiswa::find($id),
        ];
        return view('mhs.v_perkuliahan', $data);
    }

    public function kelas($id, $kode_mk){

        $data = [
            'matkul' => MataKuliah::find($kode_mk),
        ];
        return view('v_kelas', $data);
        // return $data;
    }
}
