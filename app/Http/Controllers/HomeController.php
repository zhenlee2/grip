<?php

namespace App\Http\Controllers;
// use App\Models\Users;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $user = Users::findOrFail(auth()->id());
            return view('welcome1');
    }
}
