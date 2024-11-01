<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response
    {
        return "sdfsdf";
        //Log::alert($request);
        $request->authenticate();
        
        
        $request->session()->regenerate();
        $user=auth()->user();
        return response()->json([
            "success"=>true,
            'data'=>[
                'token'=>$user->createToken($user->name())->plainTextToken,
                'name'=> $user->name(),
            ],
            'message'=>'User logged in!'
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
