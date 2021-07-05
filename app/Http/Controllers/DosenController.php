<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

use File;

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
    public function Editdetail(){
        $id_user = auth()->user()->dosen_id;

        $data = [
            'dosen' => Dosen::find($id_user),
        ];
        return view('dosen.v_profile_edit', $data);
    }
    public function updateProfile(){
        $id = auth()->user()->dosen_id;
        Request()->validate([
            // 'id' => 'required|unique:teacher,id|min:10|max:10',
            'name' => 'required',
            'address' => 'required',
            'date' => 'required',
            'birthplace' => 'required',
            'foto_dos' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if(Request()->foto_dos <> ""){
            $file = Request()->file('foto_dos');
            $nama_file = time().Request()->name.".".$file->extension();

            $tujuan_upload = 'foto_dosen';
            $file->move($tujuan_upload,$nama_file);

            $dosen = Dosen::find($id);
            File::delete('foto_dosen/'.$dosen->img_url);

            $dosen->nama = Request()->name;
            $dosen->alamat = Request()->address;
            $dosen->tgl_lahir = Request()->date;
            $dosen->tmp_lahir = Request()->birthplace;
            $dosen->img_url = $nama_file;
            $dosen->save();
        }else{
            $dosen = Dosen::find($id);
            $dosen->nama = Request()->name;
            $dosen->alamat = Request()->address;
            $dosen->tgl_lahir = Request()->date;
            $dosen->tmp_lahir = Request()->birthplace;
            $dosen->save();
        }
        return redirect()->route('DosenProfile')->with('pesan', 'Updated profile !1!1');
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
