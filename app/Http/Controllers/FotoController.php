<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use image;
use DB;
use File;
use Auth;

class FotoController extends Controller
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
        $result = DB::table('foto')
            ->get();
        return view('foto.index', compact('result'));
    }

    public function show()
    {
        return view('foto.tambah');
    }

    public function insert(Request $req)
    {
        $req->validate([
            'judul'=> 'required|max:200',
            'image'=> 'required|image|mimes:png,jpg,jpeg',
        ]);

        // return route('list_foto');
        return $req;
    }
}
