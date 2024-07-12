<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Division;
use App\Models\Users;

class DivisionreviewController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            return view('pages.dpcrpage.divisionpcr', compact('user'));
        }else {
            return redirect()->route('login');
        }
    }    
}
