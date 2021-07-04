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

    // DOSEN SECTION
    public function dosenPage()
    {
        $data = [
            'dosen' => Dosen::get(),
        ];

        return view('admin.v_dosen', $data);
    }

    public function detailDosen($id)
    {

        if (!Dosen::find($id)) {
            abort(404);
        }

        $data = [
            'dosen' => Dosen::find($id),
        ];
        return view('admin.v_dosen_detail', $data);
    }

    public function addDosen(){
        return view('admin.v_add_dosen');
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
        return view('admin.v_edit_dosen', $data);
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
