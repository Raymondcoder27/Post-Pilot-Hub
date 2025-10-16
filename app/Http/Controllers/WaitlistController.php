<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaitlistEmail;
use Illuminate\Support\Facades\Validator;

class WaitlistController extends Controller
{
    public function store(Request $request)
    {
        // Validate email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:waitlist_emails,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Store email
        $waitlist = WaitlistEmail::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'You have successfully joined the waitlist!',
            'data' => $waitlist,
        ]);
    }
}
