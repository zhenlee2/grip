<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login_request(Request $request)
    {
        // $uname=$request->username;
        // $pword=md5($request->password);
        // $pword=$request->password;
        // //dd($pword);

        
        $credentials = $request->only('username', 'password');
        // dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials)){
            $username = $request->input('username');
            $user = User::where('username', $username)->first();

            session([
                'user_id' => $user->id,
                'user_name' => $user->fname . ' ' . $user->lname,
                'user_division' => $user->division,
                'user_section' => $user->section,
                'user_level' => $user->office_id
            ]);
            
            return redirect()->route('dashboard');
        }else {
            return redirect()->route('login');
        }
    }

    public function logout_request(Request $request)
    {
        Auth::logout();
        //Session::flush();
        return redirect()->route('login');
    }
 
}

