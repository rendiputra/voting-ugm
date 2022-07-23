<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\praktikum;
use image;
use DB;
use File;
use Auth;
use Webp;

class PraktikumController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $result = DB::table('praktikums')
            ->where('status', '=', 1)
            ->paginate(10);
        return view('praktikum.index', compact('result'));
    }

    public function show()
    {
        $kategori = DB::table('kategori_praktikum')
                    ->get();
        $sub = DB::table('kategori_sub_praktikum')
                    ->get();
        return view('praktikum.tambah',['kategori_praktikum'=>$kategori,'kategori_sub_praktikum'=>$sub]);
    }

    public function edit($id)
    {
        $result = DB::table('praktikums')
        ->where('id', $id)
        ->where('status', '=', 1)
        ->first();

        return view('praktikum.update', compact('result'));
    }

    public function delete($id)
    {
        $edit = DB::table('praktikums')
        ->where([
            ['id', '=', $id],
            ['status', '=', 1],
            
        ])->update([
            'status' => 0,
        ]);

        return redirect()->route('praktikum.index')->with('sukses','Sukses hapus praktikum!');;
    }

    public function insert(Request $req)
    {
        $nama_praktikum = $req->nama_praktikum;
        $sub_praktikum = $nama_praktikum;
        if($req->sub_praktikum != NULL)
        {
            $sub_praktikum = $req->sub_praktikum;
        }
        $nama = $req->nama;
        $data = NULL;
        
        $new = new praktikum;
        $new->id_kategori_praktikum = $nama_praktikum;
        $new->id_kategori_sub_praktikum = $sub_praktikum;
        $new->nama = $nama;
        if($req->link != NULL && $req->audio == NULL && $req->image == NULL)
        {
            $new->data = $req->link;
        
            if($new->save()){
                return redirect()->route('praktikum.index')->with('sukses','Berhasil tambah praktikum!');
            }
        }
        else if($req->audio != NULL && $req->link == NULL && $req->image == NULL)
        {
            $sound = $req->audio;
            $name = time().'.'.$sound->getClientOriginalExtension();
            $lokasi = public_path('assets/sound');
            
            if($sound->move($lokasi,$name)){
                $new->data = $name;
    
                if($new->save()){
                    return redirect()->route('praktikum.index')->with('sukses','Berhasil tambah praktikum!');
                }
    
                return redirect()->route('praktikum.index')->with('error','Gagal tambah praktikum!');
            }
        }
        else if($req->image != NULL && $req->link == NULL && $req->audio == NULL)
        {
            
            $img = $req->image;
            $img = Webp::make($img);
            
            $name = time().'.webp';
            $lokasi = public_path('assets/foto');
            
            if($img->save($lokasi."/".$name)){
                $new->data = $name;
    
                if($new->save()){
                    return redirect()->route('praktikum.index')->with('sukses','Berhasil tambah foto!');
                }
    
                return redirect()->route('praktikum.index')->with('error','Gagal tambah foto!');
            }
        }
        else
        {
            echo "EROR BANG";
        }
            echo "EROR BANG";
        
        
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'judul'=> 'required|max:200',
            '_id'=> 'required|max:200',
            'sound'=> '',
        ]);

        $cek = praktikum::find($req->_id);
        // dd($cek);
        if($cek){
            if($req->image){
                $sound = $req->sound;

                $name = time().'.'.$sound->getClientOriginalExtension();
                $lokasi = public_path('assets/sound');

                if($sound->move($lokasi,$name)){
                    $edit = DB::table('sound')
                            ->where([
                                ['id', '=', $req->_id],
                            ])->update([
                                'judul' => $req->judul,
                                'image_path' => $name,
                            ]);
                    if($edit){
                        return redirect()->route('praktikum.index')->with('sukses','Berhasil edit data praktikum.');
                    }
                    return redirect()->back()->with('error','Gagal edit data praktikum!');
                }
            }else{
                $edit = DB::table('praktikum')
                        ->where([
                            ['id_praktikum', '=', $req->_id],
                            
                        ])->update([
                            'judul' => $req->judul,
                        ]);
                if($edit){
                    return redirect()->route('praktikum.index')->with('sukses','Berhasil edit data praktikum!');
                }
                return redirect()->back()->with('error','Gagal edit data praktikum!');
            }
            

        }else{
            return redirect()->back()->with('error','Gagal submit praktikum!');
        }

    }
}
