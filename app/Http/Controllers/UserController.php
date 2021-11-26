<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        return view('users.index');
    }

    public function verify($token){
        $user = User::where('remember_token', $token)
            ->whereNull('email_verified_at')
            ->firstOrFail();
        $user->email_verified_at = date('Y-m-d H:i:s');
        if($user->save())
            return view('users.validation', compact('user'));

        abort(404);
    }
}
