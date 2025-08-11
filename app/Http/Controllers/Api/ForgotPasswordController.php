<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $user->sendPasswordResetNotification($token);
        return response()->json(['message' => 'Password reset link sent successfully']);
    }
}
