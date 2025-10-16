<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function verifyPayment(Request $request)
    {
        $transactionId = $request->input('transaction_id');
        $secretKey = env('FLW_SECRET_KEY'); // Add this to .env

        $response = Http::withToken($secretKey)
            ->get("https://api.flutterwave.com/v3/transactions/{$transactionId}/verify");

        if ($response->successful()) {
            $data = $response->json();

            if ($data['status'] === 'success' && $data['data']['status'] === 'successful') {
                // Update user subscription here
                $user = $request->user();
                $plan = $data['data']['meta']['plan'] ?? 'Starter';

                $user->subscription_plan = $plan;
                $user->save();

                return response()->json(['message' => 'Payment verified and plan activated.']);
            }
        }

        return response()->json(['error' => 'Verification failed'], 400);
    }
}
