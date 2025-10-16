<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PaymentController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('/payments/verify', [PaymentController::class, 'verifyPayment']);



// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/facebook', [SocialAuthController::class, 'redirectFacebook']);
    Route::get('/auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);
    Route::post('/posts', [PostController::class, 'store']);
// });
