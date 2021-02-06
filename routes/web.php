<?php

use App\Models\Suhu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Models\Detak;
use App\Models\TekananDarah;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::get('/riwayat-detak', [HomeController::class, 'riwayat_detak'])->name('riwayat-detak');
    Route::get('/riwayat-suhu', [HomeController::class, 'riwayat_suhu'])->name('riwayat-suhu');
    Route::get('/riwayat-tekanan', [HomeController::class, 'riwayat_tekanan'])->name('riwayat-tekanan');
});
//chart
Route::get('chart-detak', [HomeController::class, 'chart_detak']);
Route::get('chart-suhu', [HomeController::class, 'chart_suhu']);
Route::get('chart-tensi', [HomeController::class, 'chart_tensi']);
Route::get('teslagi', [HomeController::class, 'test']);

//export pdf
Route::get('cetak-suhu-pdf', [PdfController::class, 'exportSuhu'])->name('export.suhu');

Route::get('/pdf-test', function () {
    $data_suhu = Suhu::latest()->limit(10)->get();
    $data_detak = Detak::latest()->limit(10)->get();
    $data_tekanan = TekananDarah::latest()->limit(10)->get();

    return view('pdf.report', [
        'data_suhu' => $data_suhu,
        'data_detak' => $data_detak,
        'data_tekanan' => $data_tekanan
    ]);
});;
