<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Services\Gmef\ShowGmef;

class GmefController extends Controller
{
    public function index(Request $request, ShowGmef $showGmef)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            $gmef = $showGmef->execute();
            $indicator = $gmef['indicator'];
            $questionnaire = $gmef['questionnaire'];
            // $title = $gmef['movtitle'];
            return view('pages.gmef.gmef',compact('user', 'indicator', 'questionnaire'));
        }else {
            return redirect()->route('login');
        }
    }
}
