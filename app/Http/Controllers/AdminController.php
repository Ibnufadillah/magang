<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
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
}
