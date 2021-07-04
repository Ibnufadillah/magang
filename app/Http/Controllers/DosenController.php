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

    public function detail($id){

        $data = [
            'dosen' => Dosen::find($id),
        ];
        return view('dosen.v_profile', $data);
    }

    public function matakuliah(){
        return view('dosen.v_matkul');
    }
    public function insertMatkul($dosen_id){
        $idDosen = Dosen::find('$dosen_id');
        Request()->validate([
            // 'id' => 'required|unique:teacher,id|min:10|max:10',
            'nama' => 'required',
            'sks' => 'required',
            'dosen_id' => 'required',
        ]);
        // $id = Dosen::find($dosen_id);

        MataKuliah::create([
    		'nama' => Request()->nama,
            'sks' => Request()->sks,
            'dosen_id' => Request()->find('$dosen_id'),
    	]);

        return redirect()->route('profilDosen')->with('pesan', 'Added new data !1!1');
    }
}
