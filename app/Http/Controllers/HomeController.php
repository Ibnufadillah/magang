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

    public function datajson()
	{
        // return view('v_home');
		return Datatables::of(Mahasiswa::get())->make(true);
	}
}
