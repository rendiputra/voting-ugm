<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use image;
use DB;
use File;
use Auth;

use App\Models\Foto;

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
            ->paginate(10);
        return view('foto.index', compact('result'));
    }

    public function show()
    {
        return view('foto.tambah');
    }

    public function delete()
    {
        return view('foto.tambah');
    }

    public function insert(Request $req)
    {
        $req->validate([
            'judul'=> 'required|max:200',
            'image'=> 'required|image|mimes:png,jpg,jpeg',
        ]);

        
        $img = $req->image;
        
        $name = time().'.'.$img->getClientOriginalExtension();
        $lokasi = public_path('assets/foto');
        
        if($img->move($lokasi,$name)){
            $new = new Foto;
            $new->judul = $req->judul;
            $new->image_path = $name;

            if($new->save()){
                // return back()->with('sukses','Berhasil submit karya!');
                return redirect()->route('foto.index')->with('sukses','Berhasil tambah foto!');
            }

            return redirect()->route('foto.index')->with('error','Gagal tambah foto!');
        }
        
    }
}
