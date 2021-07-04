<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function detail(){
        $id_user = auth()->user()->dosen_id;

        $data = [
            'dosen' => Dosen::find($id_user),
        ];
        return view('dosen.v_profile', $data);
    }

    public function matkul(){
        // $id_user = auth()->user()->mahasiswa->id;

        $data = [
            'mata_kuliah' => MataKuliah::whereNull('dosen_id')->get(),
            'matkul_count' => MataKuliah::whereNull('dosen_id')->get()->count(),
        ];
        return view('dosen.v_matkul', $data);
        // return $data;
        // return auth()->user()->dosen;
    }
    public function tambahMatkul(){
        $id_user = auth()->user()->dosen_id;
        $matkul = MataKuliah::find(Request()->id_matkul);
        $matkul->dosen_id = $id_user;
        $matkul->save();

        return redirect()->route('DosMatkul')->with('pesan', 'Added new matkul !1!1');
    }
}
