<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WaitlistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleAuthController;

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


Route::post('/waitlist', [WaitlistController::class, 'store']);

// Route::post('/payments/verify', [PaymentController::class, 'verifyPayment']);

Route::prefix('auth')->group(function () {
    Route::get('/facebook', [SocialAuthController::class, 'redirectFacebook']);
    Route::get('/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);

    Route::get('/linkedin', [SocialAuthController::class, 'redirectLinkedIn']);
    Route::get('/linkedin/callback', [SocialAuthController::class, 'handleLinkedInCallback']);

    Route::get('/tiktok', [SocialAuthController::class, 'redirectTikTok']);
    Route::get('/tiktok/callback', [SocialAuthController::class, 'handleTikTokCallback']);

    Route::get('/youtube', [SocialAuthController::class, 'redirectYouTube']);
    Route::get('/youtube/callback', [SocialAuthController::class, 'handleYouTubeCallback']);

    Route::get('/threads', [SocialAuthController::class, 'redirectThreads']);
    Route::get('/threads/callback', [SocialAuthController::class, 'handleThreadsCallback']);
});

Route::middleware('auth:sanctum')->get('/connected-accounts', function () {
    return \App\Models\SocialAccount::where('user_id', auth()->id())->get();
});



// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/facebook', [SocialAuthController::class, 'redirectFacebook']);
    Route::get('/auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);
    // Route::post('/posts', [PostController::class, 'store']);
// });

