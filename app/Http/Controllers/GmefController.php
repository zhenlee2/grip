<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Http\Request;

class GmefController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            return view('pages.gmef.gmef',compact('user'));
        }else {
            return redirect()->route('login');
        }
    }

}
