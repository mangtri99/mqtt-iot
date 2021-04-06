<?php

use App\Models\Suhu;
use App\Models\User;
use App\Models\Detak;
use App\Models\TekananDarah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/detail/{user:id}', [AdminController::class, 'show'])->name('admin.user.detail');
});
//chart
Route::get('chart-detak/{id}', [HomeController::class, 'chart_detak'])->name('chart.detak');
Route::get('chart-suhu/{id}', [HomeController::class, 'chart_suhu']);
Route::get('chart-tensi/{id}', [HomeController::class, 'chart_tensi']);
Route::get('teslagi', [HomeController::class, 'test']);

//export pdf
Route::get('cetak-suhu-pdf/{id}', [PdfController::class, 'exportSuhu'])->name('export.suhu');

Route::get('/pdf-test', function () {
    $last_update = User::where('id', '=', 3)->with(['detak', 'suhu', 'tekanan_darah' => function ($query) {
        $query->orderBy('created_at', 'ASC')->limit(10);
    }])->get();
    return $last_update;
});;
