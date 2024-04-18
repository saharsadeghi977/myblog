<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
// use Illuminate\Http\Validation\ValidationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class UserController extends Controller
{
    //

    public function login(Request $request)
    {
        \request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', \request('email'))->first();
        if (! $user || ! Hash::check(\request('password'), $user->password)) {
            // throw ValidationException::withMessages([
            //     '' => ['The provided credentials are incorrect.'],
            // ]);
            return response(
                [
                    'massage'=>'bad creds'
                ],401);
            
        }
        return $user->createToken('token_base_name')->plainTextToken;
    }
}
