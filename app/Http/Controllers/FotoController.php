<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use image;
use DB;
use File;
use Auth;
use Webp;

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
            ->where('status', '=', 1)
            ->paginate(10);
        return view('foto.index', compact('result'));
    }

    public function edit($id)
    {
        $result = DB::table('foto')
            ->where('id_foto', $id)
            ->where('status', '=', 1)
            ->first();

        return view('foto.update', compact('result'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'judul'=> 'required|max:200',
            '_id'=> 'required|max:200',
            'image'=> 'image|mimes:png,jpg,jpeg',
        ]);

        $cek = Foto::find($req->_id);
        // dd($cek);
        if($cek){
            if($req->image){
                $img = $req->image;
                $img = Webp::make($img);

                $name = time().'.'.$img->getClientOriginalExtension();
                $lokasi = public_path('assets/foto');

                if($img->move($lokasi,$name)){
                    $edit = DB::table('foto')
                            ->where([
                                ['id_foto', '=', $req->_id],
                                
                            ])->update([
                                'judul' => $req->judul,
                                'tingkatan' => $req->tingkatan,
                                'image_path' => $name,
                            ]);
                    if($edit){
                        return redirect()->route('foto.index')->with('sukses','Berhasil edit data foto.');
                    }
                    return redirect()->back()->with('error','Gagal edit data foto!');
                }
            }else{
                $edit = DB::table('foto')
                        ->where([
                            ['id_foto', '=', $req->_id],
                            
                        ])->update([
                            'judul' => $req->judul,
                            'tingkatan' => $req->tingkatan,
                        ]);
                if($edit){
                    return redirect()->route('foto.index')->with('sukses','Berhasil edit data foto!');
                }
                return redirect()->back()->with('error','Gagal edit data foto!');
            }
            

        }else{
            return redirect()->back()->with('error','Gagal submit foto!');
        }

    }

    public function show()
    {
        return view('foto.tambah');
    }

    public function delete($id)
    {
        $edit = DB::table('foto')
        ->where([
            ['id_foto', '=', $id],
            ['status', '=', 1],
            
        ])->update([
            'status' => 0,
        ]);

        return redirect()->route('foto.index')->with('sukses','Sukses hapus foto!');;
    }

    public function insert(Request $req)
    {
        $req->validate([
            'judul'=> 'required|max:200',
            'image'=> 'required|image|mimes:png,jpg,jpeg',
            'image'=> 'required',
        ]);

        
        $img = $req->image;
        $img = Webp::make($img);
        
        $name = time().'.webp';
        $lokasi = public_path('assets/foto');
        
        if($img->save($lokasi."/".$name)){
            $new = new Foto;
            $new->judul = $req->judul;
            $new->tingkatan = $req->tingkatan;
            $new->image_path = $name;

            if($new->save()){
                return redirect()->route('foto.index')->with('sukses','Berhasil tambah foto!');
            }

            return redirect()->route('foto.index')->with('error','Gagal tambah foto!');
        }
        
    }
}
