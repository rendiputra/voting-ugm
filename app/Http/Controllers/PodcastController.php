<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use image;
use DB;
use File;
use Auth;

class PodcastController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $result = DB::table('podcast')
            ->where('status', '=', 1)
            ->paginate(10);
        return view('podcast.index', compact('result'));
    }

    public function show()
    {
        return view('podcast.tambah');
    }

    public function edit($id)
    {
        $result = DB::table('podcast')
        ->where('id_podcast', $id)
        ->where('status', '=', 1)
        ->first();

        return view('podcast.update', compact('result'));
    }

    public function delete($id)
    {
        $edit = DB::table('podcast')
        ->where([
            ['id_podcast', '=', $id],
            ['status', '=', 1],
            
        ])->update([
            'status' => 0,
        ]);

        return redirect()->route('podcast.index')->with('sukses','Sukses hapus podcast!');;
    }

    public function insert(Request $req)
    {
        $req->validate([
            'judul'=> 'required|max:200',
            'sound'=> 'required',
            'tingkatan'=> 'required',
        ]);

        
        $sound = $req->sound;
        
        $name = time().'.'.$sound->getClientOriginalExtension();
        $lokasi = public_path('assets/sound');
        
        if($sound->move($lokasi,$name)){
            $new = new Podcast;
            $new->judul = $req->judul;
            $new->tingkatan = $req->tingkatan;
            $new->sound_path = $name;

            if($new->save()){
                return redirect()->route('podcast.index')->with('sukses','Berhasil tambah podcast!');
            }

            return redirect()->route('podcast.index')->with('error','Gagal tambah podcast!');
        }
        
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'judul'=> 'required|max:200',
            '_id'=> 'required|max:200',
            'sound'=> '',
        ]);

        $cek = Podcast::find($req->_id);
        // dd($cek);
        if($cek){
            if($req->image){
                $sound = $req->sound;

                $name = time().'.'.$sound->getClientOriginalExtension();
                $lokasi = public_path('assets/sound');

                if($sound->move($lokasi,$name)){
                    $edit = DB::table('sound')
                            ->where([
                                ['id_podcast', '=', $req->_id],
                            ])->update([
                                'judul' => $req->judul,
                                'image_path' => $name,
                            ]);
                    if($edit){
                        return redirect()->route('podcast.index')->with('sukses','Berhasil edit data podcast.');
                    }
                    return redirect()->back()->with('error','Gagal edit data podcast!');
                }
            }else{
                $edit = DB::table('podcast')
                        ->where([
                            ['id_podcast', '=', $req->_id],
                            
                        ])->update([
                            'judul' => $req->judul,
                        ]);
                if($edit){
                    return redirect()->route('podcast.index')->with('sukses','Berhasil edit data podcast!');
                }
                return redirect()->back()->with('error','Gagal edit data podcast!');
            }
            

        }else{
            return redirect()->back()->with('error','Gagal submit podcast!');
        }

    }
}
