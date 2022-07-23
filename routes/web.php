<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $foto_populer = DB::table('foto')
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
                ])
            ->groupBy('foto.id_foto')
            ->limit(8)
            ->orderByDesc('num_votes')
            ->get();
            
    return view('landing', compact('foto_populer'));
})->name('landing');

Route::post('/', function (Request $req) {
    Session::put('email',$req->email);
    return back();
})->name('email');

// kirim email
Route::get('send-mail/foto/{id}', function ($id) {
    // cek ada session emailnya kaga
    if(Session::get('email')){
        $check_sudah_vote_foto = DB::table('voting_foto')->where([
                 ['email', Session::get('email')],
                 ['is_confirm', 1],
             ])->exists();
             
         // cek udah pernah voting belom
        if($check_sudah_vote_foto){
            // TODO: Simpen ke table voting_foto
            
            $details = [
                'title' => 'Konfirmasi voting ',
                'body' => '
                    <p>Konfirmasi voting dengan klik tombol: </p>
                    <a href="/konfirmasi_vote/{random_kode}" class="btn btn-primary">Konfirmasi</a>
                '
            ];
            for($i=0;$i<1;$i++)
            {
                \Mail::to(Session::get('email'))->send(new \App\Mail\sendMail($details));
            }
           
           return redirect('/')->with('sukses', 'Konfirmasi voting pada email kamu!');
           
        } else {// udah pernah voting
            return redirect('/')->with('gagal', 'Masukan email!');
        }
        
    } else {//kaga ada email di session
        return redirect('/')->with('gagal', 'Masukan email!');
    }
    
});

Route::get('/voting-foto', [App\Http\Controllers\FrontController::class, 'voting_foto'])->name('voting_foto');
Route::get('/voting-foto/mahasiswa', [App\Http\Controllers\FrontController::class, 'voting_foto_mahasiswa'])->name('voting_foto_mahasiswa');
Route::get('/voting-foto/pelajar', [App\Http\Controllers\FrontController::class, 'voting_foto_pelajar'])->name('voting_foto_pelajar');
Route::get('/voting-podcast/mahasiswa', [App\Http\Controllers\FrontController::class, 'voting_podcast_mahasiswa'])->name('voting_podcast_mahasiswa');
Route::get('/voting-podcast/pelajar', [App\Http\Controllers\FrontController::class, 'voting_podcast_pelajar'])->name('voting_podcast_mahasiswa');
Route::post('/voting/foto/mahasiswa/{id}', [App\Http\Controllers\FrontController::class, 'voting_foto_email_mahasiswa'])->name('voting_foto_email_mahasiswa');// kirim email foto
Route::post('/voting/foto/pelajar/{id}', [App\Http\Controllers\FrontController::class, 'voting_foto_email_pelajar'])->name('voting_foto_email_pelajar');// kirim email foto
Route::post('/voting/podcast/mahasiswa/{id}', [App\Http\Controllers\FrontController::class, 'voting_podcast_email_mahasiswa'])->name('voting_podcast_email_mahasiswa');// kirim email podcast
Route::post('/voting/podcast/pelajar/{id}', [App\Http\Controllers\FrontController::class, 'voting_podcast_email_pelajar'])->name('voting_podcast_email_pelajar');// kirim email podcast
// Route::get('/voting-podcast/mahasiswa', [App\Http\Controllers\FrontController::class, 'voting_podcast_mahasiswa'])->name('voting_podcast_mahasiswa');
// Route::get('/voting-podcast/pelajar', [App\Http\Controllers\FrontController::class, 'voting_podcast_pelajar'])->name('voting_podcast_pelajar');
Route::get('/voting-praktikum', [App\Http\Controllers\FrontController::class, 'voting_praktikum'])->name('voting_praktikum');
Route::post('/voting-praktikum/{id_kategori}/{id}/{sub}', [App\Http\Controllers\FrontController::class, 'voting_praktikum_email'])->name('voting_praktikum_email');
Route::get('/konfirmasi_foto_vote/{random_kode}', [App\Http\Controllers\FrontController::class, 'konfirmasi_foto_vote'])->name('konfirmasi_foto_vote');
Route::get('/konfirmasi_podcast_vote/{random_kode}', [App\Http\Controllers\FrontController::class, 'konfirmasi_podcast_vote'])->name('konfirmasi_podcast_vote');
Route::get('/konfirmasi_praktikum_vote/{random_kode}', [App\Http\Controllers\FrontController::class, 'konfirmasi_praktikum_vote'])->name('konfirmasi_praktikum_vote');
// Route::get('/test/top_vote', [App\Http\Controllers\FrontController::class, 'top_vote'])->name('top_vote');

Route::get('/praktikum',function(){
    return view('user.praktikum');
})->middleware('auth');
Route::get('/praktikum/detail',function(){
    return view('user.praktikum-detail');
})->middleware('auth');

Auth::routes(['register' => false]);

// Route::get('/home',function(){
//     return redirect()->route('foto.index');
// })->middleware('auth')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'top_vote'])->middleware('auth')->name('home');
Route::get('/admin/foto', [App\Http\Controllers\FotoController::class, 'index'])->name('foto.index');
Route::get('/admin/foto/tambah', [App\Http\Controllers\FotoController::class, 'show'])->name('foto.show');
Route::post('/admin/foto/tambah', [App\Http\Controllers\FotoController::class, 'insert'])->name('foto.insert');
Route::get('/admin/foto/edit/{id}', [App\Http\Controllers\FotoController::class, 'edit'])->name('foto.edit');
Route::post('/admin/foto/update/{id}', [App\Http\Controllers\FotoController::class, 'update'])->name('foto.update');
Route::post('/admin/foto/delete/{id}', [App\Http\Controllers\FotoController::class, 'delete'])->name('foto.delete');

// Podcast
Route::get('/admin/podcast', [App\Http\Controllers\PodcastController::class, 'index'])->name('podcast.index');
Route::get('/admin/podcast/tambah', [App\Http\Controllers\PodcastController::class, 'show'])->name('podcast.show');
Route::post('/admin/podcast/tambah', [App\Http\Controllers\PodcastController::class, 'insert'])->name('podcast.insert');
Route::get('/admin/podcast/edit/{id}', [App\Http\Controllers\PodcastController::class, 'edit'])->name('podcast.edit');
Route::post('/admin/podcast/update/{id}', [App\Http\Controllers\PodcastController::class, 'update'])->name('podcast.update');
Route::post('/admin/podcast/delete/{id}', [App\Http\Controllers\PodcastController::class, 'delete'])->name('podcast.delete');


// Praktikum
Route::get('/admin/praktikum', [App\Http\Controllers\PraktikumController::class, 'index'])->name('praktikum.index');
Route::get('/admin/praktikum/tambah', [App\Http\Controllers\PraktikumController::class, 'show'])->name('praktikum.show');
Route::post('/admin/praktikum/tambah', [App\Http\Controllers\PraktikumController::class, 'insert'])->name('praktikum.insert');
Route::get('/admin/praktikum/edit/{id}', [App\Http\Controllers\PraktikumController::class, 'edit'])->name('praktikum.edit');
Route::post('/admin/praktikum/update/{id}', [App\Http\Controllers\PraktikumController::class, 'update'])->name('praktikum.update');
Route::post('/admin/praktikum/delete/{id}', [App\Http\Controllers\PraktikumController::class, 'delete'])->name('praktikum.delete');