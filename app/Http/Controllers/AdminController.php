<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MataKuliah as GlobalMataKuliah;

class AdminController extends Controller
{
    public function __construct()
    {
        $this -> MahasiswaModel = new Mahasiswa();
        $this->middleware('auth');
    }

    public function perkuliahan()
    {
        $mahasiswa = Mahasiswa::get();
        return view('admin.perkuliahan', ['mahasiswa' => $mahasiswa]);
        //    return $mahasiswa;
    }

    // MAHASISWA SECTION
    public function mhsPage()
    {
        $data = [
            'mahasiswa' => Mahasiswa::get(),
        ];

        return view('admin.mhs.v_mhs', $data);
    }
    public function detailMahasiswa($id)
    {

        if (!Mahasiswa::find($id)) {
            abort(404);
        }

        $data = [
            'mhs' => Mahasiswa::find($id),
        ];
        return view('admin.mhs.v_mhs_detail', $data);
    }

    public function addMahasiswa(){
        return view('admin.mhs.v_add_mhs');
    }
    public function insertMahasiswa(){
        Request()->validate([
            // 'id' => 'required|unique:teacher,id|min:10|max:10',
            'name' => 'required',
            'address' => 'required',
            'date' => 'required',
            'birthplace' => 'required'
        ]);

        Mahasiswa::create([
    		'nama' => Request()->name,
            'alamat' => Request()->address,
            'tgl_lahir' => Request()->date,
            'tmp_lahir' => Request()->birthplace
    	]);

        $latest = Mahasiswa::latest('id')->first();
        $id = $latest->getMhsID();
        User::create([
            'email' => $id,
            'password' => Hash::make('mhs'),
            'mahasiswa_id' => $latest->getID(),
        ]);

        return redirect()->route('mhsList')->with('pesan', 'Added new data !1!1');
    }

    public function deleteMahasiswa($id)
    {
        $dosen = Mahasiswa::find($id);
        $dosen->delete();
        return redirect()->route('mhsList')->with('pesan', 'Deleted a data !1!1');

    }
    public function editMahasiswa($id){

        if (!Mahasiswa::find($id)) {
            abort(404);
        }
        $data = [
            'mhs' => Mahasiswa::find($id),
        ];
        return view('admin.mhs.v_edit_mhs', $data);
    }

    public function updateMahasiswa($id){
        Request()->validate([
            // 'id' => 'required|unique:teacher,id|min:10|max:10',
            'name' => 'required',
            'address' => 'required',
            'date' => 'required',
            'birthplace' => 'required'
        ]);

        $mhs = Mahasiswa::find($id);
        $mhs->nama = Request()->name;
        $mhs->alamat = Request()->address;
        $mhs->tgl_lahir = Request()->date;
        $mhs->tmp_lahir = Request()->birthplace;
        $mhs->save();
        
        return redirect()->route('mhsDetail', $id)->with('pesan', 'Updated a data !1!1');
    }



    // DOSEN SECTION
    public function dosenPage()
    {
        $data = [
            'dosen' => Dosen::get(),
        ];

        return view('admin.dosen.v_dosen', $data);
    }

    public function detailDosen($id)
    {

        if (!Dosen::find($id)) {
            abort(404);
        }

        $data = [
            'dosen' => Dosen::find($id),
        ];
        return view('admin.dosen.v_dosen_detail', $data);
    }

    public function addDosen(){
        return view('admin.dosen.v_add_dosen');
    }
    public function insertDosen(){
        Request()->validate([
            // 'id' => 'required|unique:teacher,id|min:10|max:10',
            'name' => 'required',
            'address' => 'required',
            'date' => 'required',
            'birthplace' => 'required'
        ]);

        Dosen::create([
    		'nama' => Request()->name,
            'alamat' => Request()->address,
            'tgl_lahir' => Request()->date,
            'tmp_lahir' => Request()->birthplace
    	]);

        $latest = Dosen::latest('id')->first();
        $id = $latest->getDosenID();
        User::create([
            'email' => $id,
            'password' => Hash::make('dosen'),
            'dosen_id' => $latest->getID(),
        ]);


        return redirect()->route('dosenList')->with('pesan', 'Added new data !1!1');
    }

    public function deleteDosen($id)
    {
        $dosen = Dosen::find($id);
        $dosen->delete();
        return redirect()->route('dosenList')->with('pesan', 'Deleted a data !1!1');

    }
    public function editDosen($id){

        if (!Dosen::find($id)) {
            abort(404);
        }
        $data = [
            'dosen' => Dosen::find($id),
        ];
        return view('admin.dosen.v_edit_dosen', $data);
    }

    public function updateDosen($id){
        Request()->validate([
            // 'id' => 'required|unique:teacher,id|min:10|max:10',
            'name' => 'required',
            'address' => 'required',
            'date' => 'required',
            'birthplace' => 'required'
        ]);

        $dosen = Dosen::find($id);
        $dosen->nama = Request()->name;
        $dosen->alamat = Request()->address;
        $dosen->tgl_lahir = Request()->date;
        $dosen->tmp_lahir = Request()->birthplace;
        $dosen->save();
        
        return redirect()->route('dosenDetail', $id)->with('pesan', 'Updated a data !1!1');
    }

    // MATKUL SECTION
    public function matkulPage()
    {
        $data = [
            'matkul' => MataKuliah::get(),
        ];

        return view('admin.matkul.v_matkul', $data);
    }

    public function detailMatkul($id)
    {

        if (!MataKuliah::find($id)) {
            abort(404);
        }

        $data = [
            'matkul' => MataKuliah::find($id),
            'dosen_count' => MataKuliah::find($id)->whereNull('dosen_id')->get()->count(),
        ];
        return view('admin.matkul.v_matkul_detail', $data);
        //return $data;
    }

    public function addMatkul(){
        return view('admin.matkul.v_add_matkul');
    }
    public function insertMatkul(){
        Request()->validate([
            // 'id' => 'required|unique:teacher,id|min:10|max:10',
            'nama' => 'required',
            'sks' => 'required',
        ]);

        MataKuliah::create([
    		'nama' => Request()->nama,
            'sks' => Request()->sks,
    	]);

        return redirect()->route('matkulList')->with('pesan', 'Added new data !1!1');
    }

    public function deleteMatkul($id)
    {
        $matkul = MataKuliah::find($id);
        $matkul->delete();
        return redirect()->route('matkulList')->with('pesan', 'Deleted a data !1!1');

    }
    public function editMatkul($id){

        if (!MataKuliah::find($id)) {
            abort(404);
        }
        $data = [
            'matkul' => MataKuliah::find($id),
        ];
        return view('admin.matkul.v_edit_matkul', $data);
    }

    public function updateMatkul($id){
        Request()->validate([
            // 'id' => 'required|unique:teacher,id|min:10|max:10',
            'nama' => 'required',
            'sks' => 'required',
        ]);

        $matkul = MataKuliah::find($id);
        $matkul->nama = Request()->nama;
        $matkul->sks = Request()->sks;
        $matkul->save();
        
        return redirect()->route('matkulDetail', $id)->with('pesan', 'Updated a data !1!1');
    }
}
