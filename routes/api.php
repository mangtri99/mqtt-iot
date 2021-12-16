<?php

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/{user:no_pasien}', [ApiController::class, 'show']);

Route::post('/user', [ApiController::class, 'store']);

Route::post('notify', function(){
    $user = User::where('id', 9)->first();
    $sid    = "ACed2bd94413767722112cf8ea33495967";
    $token  = "23acf5a3e79430a6cf6663ea328c804e";
    $wa_from= "+17164568939";
    $twilio = new Client($sid, $token);

    $body = "Hello, welcome to codelapan.com.";

    $twilio->messages->create("+6281330092930",["from" => "$wa_from", "body" => $body]);
});
