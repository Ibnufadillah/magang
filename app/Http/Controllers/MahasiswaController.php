<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\MhsMatkul;

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
        $id = 7;
        $data = [
            'mata_kuliah' => MataKuliah::get(),
            'mahasiswa' => Mahasiswa::find($id),
        ];
        return view('mhs.v_matkul', $data);
        // return $data;
    }
    public function tambahMatkul(){
        Request()->validate([
            // 'id' => 'required|unique:teacher,id|min:10|max:10',
            
        ]);
        $id_new = 
        sprintf ('%dMK%d',Request()->id ,auth()->user()->mahasiswa->id);

        if (MhsMatkul::find($id_new)) {
            return redirect()->route('MhsMatkul')->with('alert', 'Mata Kuliah sudah diambil');
        }

        MhsMatkul::create([
    		'id' => $id_new,
    		'mahasiswa_id' => auth()->user()->mahasiswa->id,
    		'mata_kuliah_id' => Request()->id,
    	]);

        return redirect()->route('MhsMatkul')->with('pesan', 'Added new matkul !1!1');
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
