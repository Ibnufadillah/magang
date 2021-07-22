<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Datatables;
use App\Models\Mahasiswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('v_home');
    }
    public function datatable()
    {
        return view('v_dTable');
    }

    public function datajson(Request $request)
	{
        // return view('v_home');
        $model = Mahasiswa::with('mata_kuliah');
        // $model->newQuery()->select('mahasiswa.*')->with('mata_kuliah');
        // if ($request->ajax()) {
            // $model = Mahasiswa::with('mata_kuliah');
                return DataTables::eloquent($model)

                // ->addColumns('mata_kuliah', function(Mahasiswa $mhs) {
                //     return $mhs->mata_kuliah->implode('nama', ', ');
                //   })
                ->addColumn('mata_kuliah', function (Mahasiswa $mhs) {
                    return $mhs->mata_kuliah->map(function($mata_kuliah) {
                        return \Illuminate\Support\Str::limit($mata_kuliah->nama, 30, '...');
                    })->toArray();
                })
                ->toJson();
        // }
        // return view('v_dTable');
		// return datatables (Mahasiswa::get())->toJson();
	}
}
