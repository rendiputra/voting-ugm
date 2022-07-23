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
        return view('home');
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
            ->limit(3)
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
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get();
            
        $podcast_populer_pelajar = DB::table('podcast')
            ->join('voting_podcast','podcast.id_podcast','voting_podcast.id_podcast')
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
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get();
        
        $podcast_populer_mahasiswa = DB::table('podcast')
            ->join('voting_podcast','podcast.id_podcast','voting_podcast.id_podcast')
            ->selectRaw('podcast.id_podcast,
                podcast.sound_path,
                podcast.judul,
                podcast.tingkatan,
                COUNT(*) AS num_votes
            ')
            ->where([
                ['podcast.status', '=', 1],
                ['voting_podcast.is_confirm', '=', 1],
                ['podcast.tingkatan', '=', "mahasiswa"],
                ])
            ->groupBy('podcast.id_podcast')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get();
            
        // ------PRAKTIKUM-------
        // sub kategori audio video
        $praktikum_populer_audio_video = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 1],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Creative Photo
        $praktikum_populer_creative_photo = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 2],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Foto Komposisi
        $praktikum_populer_foto_komposisi = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 3],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Human Interest
        $praktikum_populer_human_interest = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 4],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Photo Series
        $praktikum_populer_photo_series = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 5],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Product Photo
        $praktikum_populer_product_photo = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 6],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Jurnalisme Pertanian
        $praktikum_populer_jurnalisme_pertanian = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 7],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Manajemen Penerbitan
        $praktikum_populer_manajemen_penerbitan = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 9],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Video Siaran
        $praktikum_populer_video_siaran = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 10],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Podcast Agricia
        $praktikum_populer_podcast_agricia = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 11],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori MTPKP
        $praktikum_populer_MTPKP = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 12],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori Periklanan
        $praktikum_populer_periklanan = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 13],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        // sub kategori PKP
        $praktikum_populer_PKP = DB::table('praktikums')
            ->join('voting_praktikum','praktikums.id','voting_praktikum.id_praktikum')
            ->selectRaw('praktikums.id,
                praktikums.nama,
                voting_praktikum.id_praktikum,
                praktikums.status,
                praktikums.id_kategori_sub_praktikum,
                COUNT(*) AS num_votes
            ')
            ->where([
                    ['praktikums.status', '=', 1],
                    ['voting_praktikum.is_confirm', '=', 1],
                    ['praktikums.id_kategori_sub_praktikum', '=', 14],
                ])
            ->groupBy('praktikums.id')
            ->limit(3)
            ->orderByDesc('num_votes')
            ->get(); 
            
        //dd($podcast_populer_PKP);
         

        // dd($generator);
        
        // $check_konfirmasi_foto = DB::table('foto')->where([
        //      ['email', $email],
        //      ['email', $email],
        //      ])->exists()

        $jml_foto_populer_mahasiswa = count($foto_populer_mahasiswa);
        $jml_foto_populer_pelajar = count($foto_populer_pelajar);
        $jml_podcast_populer_pelajar = count($podcast_populer_pelajar);
        $jml_podcast_populer_mahasiswa = count($podcast_populer_mahasiswa);
        
        
        $jml_praktikum_populer_audio_video = count($praktikum_populer_audio_video);
        $jml_praktikum_populer_creative_photo = count($praktikum_populer_creative_photo);
        $jml_praktikum_populer_foto_komposisi = count($praktikum_populer_foto_komposisi);
        $jml_praktikum_populer_human_interest = count($praktikum_populer_human_interest);
        $jml_praktikum_populer_photo_series = count($praktikum_populer_photo_series);
        $jml_praktikum_populer_product_photo = count($praktikum_populer_product_photo);
        $jml_praktikum_populer_jurnalisme_pertanian = count($praktikum_populer_jurnalisme_pertanian);
        $jml_praktikum_populer_manajemen_penerbitan = count($praktikum_populer_manajemen_penerbitan);
        $jml_praktikum_populer_video_siaran = count($praktikum_populer_video_siaran);
        $jml_praktikum_populer_podcast_agricia = count($praktikum_populer_podcast_agricia);
        $jml_praktikum_populer_MTPKP = count($praktikum_populer_MTPKP);
        $jml_praktikum_populer_periklanan = count($praktikum_populer_periklanan);
        $jml_praktikum_populer_PKP = count($praktikum_populer_PKP);
        
        
        return view('home', compact([
            'foto_populer_mahasiswa',
            'foto_populer_pelajar',
            'podcast_populer_pelajar',
            'podcast_populer_mahasiswa',
            
            'jml_foto_populer_mahasiswa',
            'jml_foto_populer_pelajar',
            'jml_podcast_populer_pelajar',
            'jml_podcast_populer_mahasiswa',
            
            'praktikum_populer_audio_video',
            'praktikum_populer_creative_photo',
            'praktikum_populer_foto_komposisi',
            'praktikum_populer_human_interest',
            'praktikum_populer_photo_series',
            'praktikum_populer_product_photo',
            'praktikum_populer_jurnalisme_pertanian',
            'praktikum_populer_manajemen_penerbitan',
            'praktikum_populer_video_siaran',
            'praktikum_populer_podcast_agricia',
            'praktikum_populer_MTPKP',
            'praktikum_populer_periklanan',
            'praktikum_populer_PKP',
            
            'jml_praktikum_populer_audio_video',
            'jml_praktikum_populer_creative_photo',
            'jml_praktikum_populer_foto_komposisi',
            'jml_praktikum_populer_human_interest',
            'jml_praktikum_populer_photo_series',
            'jml_praktikum_populer_product_photo',
            'jml_praktikum_populer_jurnalisme_pertanian',
            'jml_praktikum_populer_manajemen_penerbitan',
            'jml_praktikum_populer_video_siaran',
            'jml_praktikum_populer_podcast_agricia',
            'jml_praktikum_populer_MTPKP',
            'jml_praktikum_populer_periklanan',
            'jml_praktikum_populer_PKP',
            ]));
    }
}
