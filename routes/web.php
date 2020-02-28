<?php

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
    return view('welcome');
});
// Import mdel
use App\Mahasiswa;
use App\Dosen;
use App\Hobi;
// Route one to One
Route::get('relasi-1',function(){
    $mhs = Mahasiswa::where('nim','=','1010101')->first();

    //Menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->wali->nama;
});

Route::get('relasi-2',function(){
    $mhs = Mahasiswa::where('nim','=','1010101')->first();

    //Menampilkan data dosen dari mahasiswa yang dipilih
    return $mhs->dosen->nama;
});

Route::get('relasi-3',function(){
    $dosen = Dosen::where('nama','=','Abdul Musthafa')->first();

    //Menampilkan seluruh data mahasiswa didikannya
    foreach ($dosen->mahasiswa as $temp) {
        echo '<li> Nama : ' .$temp->nama,
             ' <strong>'. $temp->nim.'</strong></li>';
    }
});

Route::get('relasi-4',function(){
    $dadang = Mahasiswa::where('nama','=','Dadang Peloy')->first();

    //Menampilkan seluruh data mahasiswa didikannya
    foreach ($dadang->hobi as $temp) {
        echo '<li>'. $temp->hobi.'</li>';
    }
});

Route::get('relasi-5',function(){
    $game = Hobi::where('hobi','=','Game Mobile')->first();

    //Menampilkan seluruh data mahasiswa didikannya
    foreach ($game->mahasiswa as $temp) {
        echo '<li> Nama : ' .$temp->nama,
             ' <strong>'. $temp->nim.'</strong></li>';
    }
});

Route::get('relasi-join',function(){

    // $sql = Mahasiswa::with('wali')->get();
    $sql = DB::table('mahasiswas')
            ->select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
            ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')
            ->get();
    dd($sql);
});

Route::get('eloquent',function(){
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
    return view('eloquent',compact('mahasiswa'));
});

Route::get('lat-eloquent', function(){

    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->where('nama','=','Mamat Kabrit')->first();
    return view('lat-eloquent',compact('mahasiswa'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Blade template
Route::get('beranda', function(){
    return view('beranda');
});
Route::get('tentang', function(){
    return view('tentang');
});
Route::get('kontak', function(){
    return view('kontak');
});

// CRUD
Route::resource('dosen','DosenController');
Route::resource('hobi','HobiController');
Route::resource('mahasiswa','MahasiswaController');
Route::resource('wali','WaliController');
