<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use image;
use DB;
use File;
use Auth;
use Session;

use App\Models\Foto;
use App\Models\Podcast;
use App\Models\Voting_foto;
use App\Models\Voting_podcast;
use App\Models\Voting_praktikum;

class FrontController extends Controller
{
    //

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
    
    public function top_vote(){
        $foto_populer_mahasiswa = DB::table('foto')
            ->join('voting_foto','foto.id_foto','voting_foto.id_foto')
            ->selectRaw('foto.id_foto,
                foto.image_path,
                foto.judul,
                foto.tingkatan,
                COUNT(*) AS num_votes
            ')
            ->where([
                ['foto.status', '=', 1],
                ['voting_foto.is_confirm', '=', 1],
                ['foto.tingkatan', '=', "mahasiswa"],
                ])
            ->groupBy('foto.id_foto')
            ->limit(5)
            ->orderByDesc('num_votes')
            ->get();
            
        $foto_populer_pelajar = DB::table('foto')
            ->join('voting_foto','foto.id_foto','voting_foto.id_foto')
            ->selectRaw('foto.id_foto,
                foto.image_path,
                foto.judul,
                foto.tingkatan,
                COUNT(*) AS num_votes
            ')
            ->where([
                ['foto.status', '=', 1],
                ['voting_foto.is_confirm', '=', 1],
                ['foto.tingkatan', '=', "pelajar"],
                ])
            ->groupBy('foto.id_foto')
            ->limit(5)
            ->orderByDesc('num_votes')
            ->get();
            
            
        $podcast_populer_pelajar = DB::table('podcast')
            ->join('voting_podcast','podcast.id_foto','voting_podcast.id_podcast')
            ->selectRaw('podcast.id_podcast,
                podcast.sound_path,
                podcast.judul,
                podcast.tingkatan,
                COUNT(*) AS num_votes
            ')
            ->where([
                ['podcast.status', '=', 1],
                ['voting_podcast.is_confirm', '=', 1],
                ['podcast.tingkatan', '=', "pelajar"],
                ])
            ->groupBy('podcast.id_podcast')
            ->limit(5)
            ->orderByDesc('num_votes')
            ->get();    
        
        $result = DB::table('podcast')
            ->where('status', '=', 1)
            ->paginate(10);
            
        $generator = $this->generateRandomString(50);
        
        dd($generator);
        
        // $check_konfirmasi_foto = DB::table('foto')->where([
        //      ['email', $email],
        //      ['email', $email],
        //      ])->exists()


        // return view('podcast.index', compact('result'));
    }
    
    
    //foto gak pake tingkatan
    public function voting_foto_email($id) {
        $generator = $this->generateRandomString(50);
        
        
        // cek ada session emailnya kaga
        if(\Session::get('email')){
            $check_sudah_vote_foto = DB::table('voting_foto')->where([
                     ['ip', \Session::get('email')],
                     ['is_confirm', 1],
                 ])
                //  ->orWhere('id_foto', $id)
                 ->exists();
                 
        
             // cek udah pernah voting belom
            if(!$check_sudah_vote_foto){
                $foto = DB::table('foto')
                    ->where('id_foto',$id)->first();
                // TODO: Simpen ke table voting_foto
                $new = new Voting_foto;
                $new->id_foto = $id;
                $new->ip = \Session::get('email'); //email
                $new->random_kode = $generator;
                
                if($new->save()){
                    $details = [
                    'title' => 'Konfirmasi voting Karya Fotografi',
                    'body' => '
                        <p>Konfirmasi voting karya ('.$foto->judul.') dengan klik link dibawah: </p>
                        <a href="'. \Route('konfirmasi_foto_vote', $generator) .'" class="btn btn-primary">Konfirmasi voting</a>
                    '
                    ];
                    for($i=0;$i<1;$i++)
                    {
                        \Mail::to(\Session::get('email'))->send(new \App\Mail\sendMail($details));
                    }
                   
                   return back()->with('sukses', 'Konfirmasi voting pada email kamu! <b>"'.Session::get('email').'"</b>');
                }
                
               
            } else {// udah pernah voting
                return back()->with('gagal', 'Masukan email!');
            }
            
        } else {//kaga ada email di session
            return back()->with('gagal', 'Masukan email!');
        }
    }
    
    //foto mahasiswa
    public function voting_foto_email_mahasiswa($id) {
        $generator = $this->generateRandomString(50);
        
        // cek ada session emailnya kaga
        if(\Session::get('email')){
            $check_sudah_vote_foto = DB::table('voting_foto')->where([
                     ['ip', \Session::get('email')],
                     ['is_confirm', 1],
                     ['tingkatan', "mahasiswa"],
                 ])
                //  ->orWhere('id_foto', $id)
                 ->exists();
                 
            
             // cek udah pernah voting belom
            if(!$check_sudah_vote_foto){
                // TODO: Simpen ke table voting_foto
                $new = new Voting_foto;
                $new->id_foto = $id;
                $new->ip = \Session::get('email'); //email
                $new->tingkatan = "mahasiswa";
                $new->random_kode = $generator;
                
                if($new->save()){
                    $foto = DB::table('foto')
                        ->where('id_foto',$id)->first();
                    $details = [
                    'title' => 'Konfirmasi voting Fotografi Mahasiswa',
                    'body' => '
                        <p>Konfirmasi voting karya ('.$foto->judul.') dengan klik link dibawah: </p>
                        <a href="'. \Route('konfirmasi_foto_vote', $generator) .'" class="btn btn-primary">Konfirmasi voting</a>
                    '
                    ];
                    for($i=0;$i<1;$i++)
                    {
                        \Mail::to(\Session::get('email'))->send(new \App\Mail\sendMail($details));
                    }
                   
                   return redirect('/voting-foto/mahasiswa')->with('sukses', 'Konfirmasi voting pada email kamu! <b>"'.Session::get('email').'"</b>');
                }
                
               
            } else {// udah pernah voting
                return redirect('/voting-foto/mahasiswa')->with('gagal', 'Anda sudah melakukan voting!');
            }
            
        } else {//kaga ada email di session
            return redirect('/voting-foto/mahasiswa')->with('gagal', 'Silahkan masukan email!');
        }
    }
    
    //foto pelajar
    public function voting_foto_email_pelajar($id) {
        $generator = $this->generateRandomString(50);
        
        // cek ada session emailnya kaga
        if(\Session::get('email')){
            $check_sudah_vote_foto = DB::table('voting_foto')->where([
                     ['ip', \Session::get('email')],
                     ['is_confirm', 1],
                     ['tingkatan', "pelajar"],
                 ])
                 ->exists();
                 
            
             // cek udah pernah voting belom
            if(!$check_sudah_vote_foto){
                // TODO: Simpen ke table voting_foto
                $new = new Voting_foto;
                $new->id_foto = $id;
                $new->ip = \Session::get('email'); //email
                $new->tingkatan = "pelajar"; 
                $new->random_kode = $generator;
                
                if($new->save()){
                    $foto = DB::table('foto')
                    ->where('id_foto',$id)->first();
                    $details = [
                    'title' => 'Konfirmasi voting Fotografi Pelajar',
                    'body' => '
                        <p>Konfirmasi voting karya ('.$foto->judul.') dengan klik link dibawah: </p>
                        <a href="'. \Route('konfirmasi_foto_vote', $generator) .'" class="btn btn-primary">Konfirmasi voting</a>
                    '
                    ];
                    for($i=0;$i<1;$i++)
                    {
                        \Mail::to(\Session::get('email'))->send(new \App\Mail\sendMail($details));
                    }
                   
                   return redirect('/voting-foto/pelajar')->with('sukses', 'Konfirmasi voting pada email kamu! <b>"'.Session::get('email').'"</b>');
                }
                
               
            } else {// udah pernah voting
                return redirect('/voting-foto/pelajar')->with('gagal', 'Anda sudah melakukan voting!');
            }
            
        } else {//kaga ada email di session
            return redirect('/voting-foto/pelajar')->with('gagal', 'Silahkan masukan email!');
        }
    }
    
    // kirim email podcast
    public function voting_podcast_email($id) {
        $generator = $this->generateRandomString(50);
        
        // cek ada session emailnya kaga
        if(\Session::get('email')){
            $check_sudah_vote_podcast = DB::table('voting_podcast')->where([
                     ['ip', \Session::get('email')],
                     ['is_confirm', 1],
                 ])->exists();
                 
             // cek udah pernah voting belom
            if(!$check_sudah_vote_podcast){
                // TODO: Simpen ke table voting_foto
                
                $new = new Voting_podcast;
                $new->id_podcast = $id;
                $new->ip = \Session::get('email'); //email
                $new->random_kode = $generator;
                
                if($new->save()){
                    $podcast = DB::table('podcast')
                        ->where('id_podcast',$id)->first(); 
                    $details = [
                    'title' => 'Konfirmasi voting ',
                    'body' => '
                        <p>Konfirmasi voting karya ('. $podcast->judul.') dengan klik link dibawah: </p>
                        <a href="'. \Route('konfirmasi_podcast_vote', $generator) .'" class="btn btn-primary">Konfirmasi voting</a>
                    '
                    ];
                    for($i=0;$i<1;$i++)
                    {
                        \Mail::to(\Session::get('email'))->send(new \App\Mail\sendMail($details));
                    }
                   
                   return redirect('/voting-podcast')->with('sukses', 'Konfirmasi voting pada email kamu! <b>"'.Session::get('email').'"</b>');
                }
                
               
            } else {// udah pernah voting
                return redirect('/voting-podcast')->with('gagal', 'Masukan email!');
            }
            
        } else {//kaga ada email di session
            return redirect('/voting-podcast')->with('gagal', 'Masukan email!');
        }
    }
    
    // kirim email podcast mahasiswa
    public function voting_podcast_email_mahasiswa($id) {
        $generator = $this->generateRandomString(50);
        
        
        // cek ada session emailnya kaga
        if(\Session::get('email')){
            $check_sudah_vote_podcast = DB::table('voting_podcast')->where([
                         ['ip', \Session::get('email')],
                         ['is_confirm', 1],
                         ['tingkatan', "mahasiswa"],
                        //  ['id_foto', "$id"],
                    ])
                    //->orWhere('id_foto', $id)
                    ->exists();
                    
             // cek udah pernah voting belom
            if(!$check_sudah_vote_podcast){
                $new = new Voting_podcast;
                $new->id_podcast = $id;
                $new->ip = \Session::get('email'); //email
                $new->random_kode = $generator;
                $new->tingkatan = "mahasiswa";
                
                if($new->save()){
                    $podcast = DB::table('podcast')
                        ->where('id_podcast',$id)->first(); 
                    $details = [
                    'title' => 'Konfirmasi voting Podcast Mahasiswa',
                    'body' => '
                        <p>Konfirmasi voting karya ('. $podcast->judul.') dengan klik link dibawah: </p>
                        <a href="'. \Route('konfirmasi_podcast_vote', $generator) .'" class="btn btn-primary">Konfirmasi voting</a>
                    '
                    ];
                    for($i=0;$i<1;$i++)
                    {
                        \Mail::to(\Session::get('email'))->send(new \App\Mail\sendMail($details));
                    }
                   
                   return redirect('/voting-podcast/mahasiswa')->with('sukses', 'Konfirmasi voting pada email kamu! <b>"'.Session::get('email').'"</b>');
                }
                
               
            } else {// udah pernah voting
                return redirect('/voting-podcast/mahasiswa')->with('gagal', 'Anda sudah melakukan voting!');
            }
            
        } else {//kaga ada email di session
            return redirect('/voting-podcast/mahasiswa')->with('gagal', 'Silahkan masukan email!');
        }
    }
    
    // kirim email podcast pelajar
    public function voting_podcast_email_pelajar($id) {
        $generator = $this->generateRandomString(50);
        
        // cek ada session emailnya kaga
        if(\Session::get('email')){
            $check_sudah_vote_podcast = DB::table('voting_podcast')->where([
                         ['ip', \Session::get('email')],
                         ['is_confirm', 1],
                         ['tingkatan', "pelajar"],
                         ['id_podcast', $id],
                    ])
                    //->orWhere('id_foto', $id)
                    ->exists();
            $podcast = DB::table('podcast')
            ->where('id_podcast',$id)->first();
             // cek udah pernah voting belom
            if(!$check_sudah_vote_podcast){
                $new = new Voting_podcast;
                $new->id_podcast = $id;
                $new->ip = \Session::get('email'); //email
                $new->random_kode = $generator;
                $new->tingkatan = "pelajar";
                
                if($new->save()){
                    $details = [
                    'title' => 'Konfirmasi voting Podcast Pelajar',
                    'body' => '
                        <p>Konfirmasi voting karya ('. $podcast->judul.') dengan klik link dibawah: </p>
                        <a href="'. \Route('konfirmasi_podcast_vote', $generator) .'" class="btn btn-primary">Konfirmasi voting</a>
                    '
                    ];
                    for($i=0;$i<1;$i++)
                    {
                        \Mail::to(\Session::get('email'))->send(new \App\Mail\sendMail($details));
                    }
                   
                   return redirect('/voting-podcast/pelajar')->with('sukses', 'Konfirmasi voting pada email kamu! <b>"'.Session::get('email').'"</b>');
                }
                
               
            } else {// udah pernah voting
                return redirect('/voting-podcast/pelajar')->with('gagal', 'Anda sudah melakukan voting!');
            }
            
        } else {//kaga ada email di session
            return redirect('/voting-podcast/pelajar')->with('gagal', 'Silahkan masukan email!');
        }
    }
    
    public function konfirmasi_foto_vote($random_id){
        $check_konfirmasi_vote = DB::table('voting_foto')->where([
                 ['random_kode', $random_id],
             ])->exists();
             
            if($check_konfirmasi_vote){
                $edit = DB::table('voting_foto')
                    ->where([
                        ['random_kode', $random_id],
                    ])->update([
                        'is_confirm' => 1,
                    ]);
            } else {
                return redirect()->route('voting_foto_mahasiswa')->with('gagal','Gagal konfirmasi voting | (Kode tidak valid)');
            }

        return redirect()->route('voting_foto_mahasiswa')->with('sukses','Berhasil verifikasi voting!');
    }
    
    public function konfirmasi_praktikum_vote($random_id){
        $check_konfirmasi_vote = DB::table('voting_praktikum')->where([
                 ['random_kode', $random_id],
                 ])->exists();
             
            if($check_konfirmasi_vote){
                $edit = DB::table('voting_praktikum')
                    ->where([
                        ['random_kode', $random_id],
                    ])->update([
                        'is_confirm' => 1,
                    ]);
            } else {
                return redirect()->route('voting_praktikum')->with('gagal','Gagal konfirmasi voting | (Kode tidak valid)');
            }

        return redirect()->route('voting_praktikum')->with('sukses','Berhasil verifikasi voting!');
    }
    
    public function konfirmasi_podcast_vote($random_id){
        $check_konfirmasi_vote = DB::table('voting_podcast')->where([
                 ['random_kode', $random_id],
             ])->exists();
             
            if($check_konfirmasi_vote){
                $edit = DB::table('voting_podcast')
                    ->where([
                        ['random_kode', $random_id],
                    ])->update([
                        'is_confirm' => 1,
                    ]);
            } else {
                return redirect()->route('voting_podcast_mahasiswa')->with('gagal','Gagal konfirmasi voting | (Kode tidak valid)');
            }

        return redirect()->route('voting_podcast_mahasiswa')->with('sukses','Berhasil verifikasi voting!');
    }
    
    // public function voting_foto(){
    //     $result = DB::table('foto')
    //         ->where('status', '=', 1)
    //         ->paginate(9);

    //     return view('foto', compact('result'));
    // }
    
    public function voting_foto_mahasiswa(){
        $result = DB::table('foto')
            ->where([
                     ['status', 1],
                     ['tingkatan', "mahasiswa"],
                ])
            ->paginate(9);
        $voting_foto = DB::table('voting_foto')
        ->where([
            ['ip',Session::get('email')],
            ['is_confirm',1]
            ])
            ->get();
        return view('foto', compact(['result','voting_foto']));
    }
    
      public function voting_foto_pelajar(){
        $result = DB::table('foto')
            ->where([
                 ['status', 1],
                 ['tingkatan', "pelajar"],
            ])
            ->paginate(9);

        $voting_foto = DB::table('voting_foto')
        ->where([
            ['ip',Session::get('email')],
            ['is_confirm',1]
            ])
            ->get();
        return view('foto_pelajar', compact(['result','voting_foto']));
    }
    
    public function voting_podcast_mahasiswa(){
        $result = DB::table('podcast')
            ->where([
                     ['status', 1],
                     ['tingkatan', "mahasiswa"],
                ])
            ->paginate(9);
        // dd($result);
        $voting_podcast = DB::table('voting_podcast')
        ->where([
            ['ip',Session::get('email')],
            ['is_confirm',1]
            ])
            ->get();
        return view('podcast', compact(['result','voting_podcast']));
    }
    
    public function voting_podcast_pelajar(){
        $result = DB::table('podcast')
            ->where([
                     ['status', 1],
                     ['tingkatan', "pelajar"],
                ])
            ->paginate(9);
        // dd($result);
        $voting_podcast = DB::table('voting_podcast')
        ->where([
            ['ip',Session::get('email')],
            ['is_confirm',1]
            ])
            ->get();
        return view('podcast_pelajar', compact(['result','voting_podcast']));
    }
    
    public function voting_praktikum(){
        $all = DB::table('praktikums')
            ->where('status', '=', 1)
            ->get();
        $kategori_praktikum = DB::table('kategori_praktikum')
            ->get();
        $kategori_sub_praktikum = DB::table('kategori_sub_praktikum')
            ->get();
        $voting_praktikum = DB::Table('voting_praktikum')
        ->where('is_confirm',1)
        ->where('ip',Session::get('email'))
        ->get();
        // $subpraktikum = DB::table('praktikums')
        //     ->where('status', '=', 1)
        //     ->select('sub_praktikum')
        //     ->distinct('sub_praktikum')
        //     ->get();

        return view('praktikum', ['all'=>$all,'kategori_praktikum'=>$kategori_praktikum,'kategori_sub_praktikum'=>$kategori_sub_praktikum,'voting_praktikum'=>$voting_praktikum]);
    }
    
    
    function generateRandomString($length = 50) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    // praktikum
    public function voting_praktikum_email($id_kategori ,$id, $sub) {
        $generator = $this->generateRandomString(50);
        
        
        // cek ada session emailnya kaga
        if(\Session::get('email')){
            $check_sudah_vote_praktikum = DB::table('voting_praktikum')->where([
                     ['ip', \Session::get('email')],
                     ['is_confirm', 1],
                     ['id_kategori', $id_kategori],
                     ['id_sub_kategori', $sub],
                 ])
                //  ->orWhere('id_praktikum', $id)
                 ->exists();
                 
        $kategori_praktikum = DB::table('kategori_praktikum')
        ->where('id',$id_kategori)->first();
        $kategori_sub_praktikum = DB::table('kategori_sub_praktikum')
        ->where('id',$sub)->first();
        $praktikum = DB::table('praktikums')
        ->where('id',$id)->first();
                 
             // cek udah pernah voting belom
            if(!$check_sudah_vote_praktikum){
                // TODO: Simpen ke table voting_foto
                $new = new Voting_praktikum;
                $new->id_praktikum = $id;
                $new->ip = \Session::get('email'); //email
                $new->id_kategori = $id_kategori;
                $new->id_sub_kategori = $sub;
                $new->random_kode = $generator;
                
                if($new->save()){
                    $details = [
                    'title' => 'Konfirmasi voting untuk ' .$kategori_praktikum->nama_praktikum." (".$kategori_sub_praktikum->sub_praktikum.")",
                    'body' => '
                        <p>Konfirmasi voting karya ('.$praktikum->nama.') dengan klik link dibawah: </p>
                        <a href="'. \Route('konfirmasi_praktikum_vote', $generator) .'" class="btn btn-primary">Konfirmasi voting</a>
                    '
                    ];
                    for($i=0;$i<1;$i++)
                    {
                        \Mail::to(\Session::get('email'))->send(new \App\Mail\sendMail($details));
                    }
                   
                   return redirect('/voting-praktikum')->with('sukses', 'Konfirmasi voting pada email kamu! <b>"'.Session::get('email').'"</b>');
                }
                
               
            } else {// udah pernah voting
                return redirect('/voting-praktikum')->with('sukses', 'Anda sudah melakukan voting!');
            }
            
        } else {//kaga ada email di session
            return redirect('/voting-praktikum')->with('gagal', 'Silahkan masukan email!');
        }
    }

}
