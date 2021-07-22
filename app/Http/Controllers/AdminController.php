<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Datatables;

use File;
 
  
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
    public function mhsPage(Request $request)
    {
        $model = Mahasiswa::with('mata_kuliah');
        if ($request->ajax()) {
                return DataTables::eloquent($model)
                ->addColumn('mata_kuliah', function (Mahasiswa $mhs) {
                    return $mhs->mata_kuliah->map(function($mata_kuliah) {
                        return \Illuminate\Support\Str::limit($mata_kuliah->nama, 30, '...');
                    })->toArray();
                })
                ->addColumn('action', function(Mahasiswa $mhs){
                    $btn = '
                    <a class="btn btn-info" href="#"><i class="far fa-edit"></i> Detail</a>
                    <a class="btn btn-secondary" href="#"><i class="far fa-edit"></i> Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#">
                    <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                    ';
                    return $btn;
                 })
                ->rawColumns(['action'])
                ->toJson();
        }
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
            'birthplace' => 'required',
            'foto_mhs' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

		$file = Request()->file('foto_mhs');
        $nama_file = time().Request()->name.".".$file->extension();

		$tujuan_upload = 'foto_mhs';
		$file->move($tujuan_upload,$nama_file);

        Mahasiswa::create([
    		'nama' => Request()->name,
            'alamat' => Request()->address,
            'tgl_lahir' => Request()->date,
            'tmp_lahir' => Request()->birthplace,
            'img_url' => $nama_file
    	]);

        $latest = Mahasiswa::latest('id')->first();
        $id = $latest->getMhsID();
        User::create([
            'email' => $id,
            'password' => Hash::make('mhs'),
            'level' => '3',
            'mahasiswa_id' => $latest->getID(),
        ]);

        return redirect()->route('mhsList')->with('pesan', 'Added new data !1!1');
    }

    public function deleteMahasiswa($id)
    {
        $mhs = Mahasiswa::find($id);
        File::delete('foto_mhs/'.$mhs->img_url);

        $mhs->delete();
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
            'birthplace' => 'required',
            'foto_mhs' => 'file|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        if(Request()->foto_mhs <> ""){
            $file = Request()->file('foto_mhs');
            $nama_file = time().Request()->name.".".$file->extension();

            $tujuan_upload = 'foto_mhs';
            $file->move($tujuan_upload,$nama_file);

            $mhs = Mahasiswa::find($id);
            
            File::delete('foto_mhs/'.$mhs->img_url);
            $mhs->nama = Request()->name;
            $mhs->alamat = Request()->address;
            $mhs->tgl_lahir = Request()->date;
            $mhs->tmp_lahir = Request()->birthplace;
            $mhs->img_url = $nama_file;
            $mhs->save();
        }else{
            $mhs = Mahasiswa::find($id);
            $mhs->nama = Request()->name;
            $mhs->alamat = Request()->address;
            $mhs->tgl_lahir = Request()->date;
            $mhs->tmp_lahir = Request()->birthplace;
            $mhs->save();
        }
		

        
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
            'birthplace' => 'required',
            'foto_dos' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

		$file = Request()->file('foto_dos');
        $nama_file = time().Request()->name.".".$file->extension();

		$tujuan_upload = 'foto_dosen';
		$file->move($tujuan_upload,$nama_file);

        Dosen::create([
    		'nama' => Request()->name,
            'alamat' => Request()->address,
            'tgl_lahir' => Request()->date,
            'tmp_lahir' => Request()->birthplace,
            'img_url' => $nama_file
    	]);

        $latest = Dosen::latest('id')->first();
        $id = $latest->getDosenID();
        User::create([
            'email' => $id,
            'password' => Hash::make('dosen'),
            'level' => '3',
            'dosen_id' => $latest->getID(),
        ]);


        return redirect()->route('dosenList')->with('pesan', 'Added new data !1!1');
    }

    public function deleteDosen($id)
    {
        $dosen = Dosen::find($id);
        File::delete('foto_dosen/'.$dosen->img_url);
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
        ];
        return view('admin.matkul.v_matkul_detail', $data);
        //return $data;
    }

    public function addMatkul(){
        $data = [
            'dosen' => Dosen::get(),
        ];
        return view('admin.matkul.v_add_matkul', $data);
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
            'dosen_id' => Request()->id_dosen,
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
            'dosen' => Dosen::get(),
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
        $matkul->dosen_id = Request()->id_dosen;
        $matkul->save();
        
        return redirect()->route('matkulDetail', $id)->with('pesan', 'Updated a data !1!1');
    }
}
