<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

use App\Services\User\UserAccount;

class UserController extends Controller
{
    public function index(UserAccount $UserAccount)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            if($user->role_id == 1){
                $data = $UserAccount->execute();
                return view('pages.userlist', compact('data', 'user'));
            }else{
                return redirect()->route('dashboard');
            }
            
        }else {
            return redirect()->route('login');
        }
    }

    public function index1()
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            // $data = $UserAccount->execute();
                return view('pages.user.user-profile', compact('user'));
          
        }else {
            return redirect()->route('login');
        }
    }

}
