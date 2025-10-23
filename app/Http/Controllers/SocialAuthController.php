<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;
// use App\Models\SocialAccount;
// use Illuminate\Support\Facades\Auth;

// class SocialAuthController extends Controller
// {
//     public function redirectFacebook()
//     {
//         $url = "https://www.facebook.com/v20.0/dialog/oauth?" . http_build_query([
//             'client_id' => env('FACEBOOK_APP_ID'),
//             'redirect_uri' => env('FACEBOOK_REDIRECT_URI'),
//             // 'scope' => 'pages_show_list,instagram_basic,pages_manage_posts,instagram_content_publish,pages_read_engagement,pages_manage_engagement',
//             'scope' => 'public_profile,pages_show_list',
//             'response_type' => 'code',
//         ]);

//         // return response()->json(['url' => $url]);
//         return redirect($url); 
//     }

// public function handleFacebookCallback(Request $request)
// {
//     // 1. Make sure 'code' exists
//     if (!$request->has('code')) {
//         return redirect(env('FRONTEND_URL') . '/settings?error=missing_code');
//     }

//     // 2. Exchange code for access token
//     $response = Http::asForm()->post('https://graph.facebook.com/v20.0/oauth/access_token', [
//         'client_id' => env('FACEBOOK_APP_ID'),
//         'redirect_uri' => env('FACEBOOK_REDIRECT_URI'),
//         'client_secret' => env('FACEBOOK_APP_SECRET'),
//         'code' => $request->code,
//     ])->json();

//     // 3. Check if access_token exists
//     if (!isset($response['access_token'])) {
//         // Dump the response for debugging
//         if (!isset($response['access_token'])) {
//     dd([
//         'request_code' => $request->code,
//         'redirect_uri' => env('FACEBOOK_REDIRECT_URI'),
//         'response' => $response,
//     ]);
// }

//         // Or redirect with an error
//         return redirect(env('FRONTEND_URL') . '/settings?error=no_access_token');
//     }

//     // 4. Save token to database
//     SocialAccount::updateOrCreate(
//         ['user_id' => Auth::id(), 'platform' => 'facebook'],
//         [
//             'access_token' => $response['access_token'],
//             'expires_in' => $response['expires_in'] ?? null,
//         ]
//     );

//     // 5. Redirect back to frontend
//     return redirect(env('FRONTEND_URL') . '/settings?connected=facebook');
// }

// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialAuthController extends Controller
{
    // 🟦 Facebook / Instagram
    public function redirectFacebook() {
        return Socialite::driver('facebook')->scopes(['pages_show_list', 'instagram_basic', 'pages_manage_posts'])->redirect();
    }

    public function handleFacebookCallback() {
        try {
            $user = Socialite::driver('facebook')->user();
            return redirect(config('app.frontend_url').'/dashboard?connected=facebook');
        } catch (Exception $e) {
            return redirect(config('app.frontend_url').'/dashboard?error=facebook');
        }
    }

    // 🔷 LinkedIn
    public function redirectLinkedIn() {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedInCallback() {
        try {
            $user = Socialite::driver('linkedin')->user();
            return redirect(config('app.frontend_url').'/dashboard?connected=linkedin');
        } catch (Exception $e) {
            return redirect(config('app.frontend_url').'/dashboard?error=linkedin');
        }
    }

    // 🎵 TikTok
    public function redirectTikTok() {
        return Socialite::driver('tiktok')->redirect();
    }

    public function handleTikTokCallback() {
        try {
            $user = Socialite::driver('tiktok')->user();
            // return redirect(config('app.frontend_url').'/dashboard?connected=tiktok');
            return redirect(config('app.frontend_url').'/publish?connected=tiktok');
        } catch (Exception $e) {
            return redirect(config('app.frontend_url').'/dashboard?error=tiktok');
        }
    }

    // ▶️ YouTube
    public function redirectYouTube() {
        return Socialite::driver('google')
            ->scopes(['https://www.googleapis.com/auth/youtube.upload'])
            ->redirect();
    }

    public function handleYouTubeCallback() {
        try {
            $user = Socialite::driver('google')->user();
            return redirect(config('app.frontend_url').'/dashboard?connected=youtube');
        } catch (Exception $e) {
            return redirect(config('app.frontend_url').'/dashboard?error=youtube');
        }
    }

    // 🧵 Threads (custom API since no Socialite driver yet)
    public function redirectThreads() {
        // Placeholder for Threads API integration
        return response()->json(['message' => 'Threads integration coming soon']);
    }

    public function handleThreadsCallback() {
        return response()->json(['message' => 'Threads callback not implemented']);
    }
}

