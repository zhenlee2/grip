<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Indicator;
use App\Models\Category;
use App\Models\Users;

use App\Services\OfficePerformanceContractReview\ShowPerformanceContractRating;
use App\Services\OfficePerformanceContractReview\PerformanceContractRating;
use SebastianBergmann\Environment\Console;

class ShowopcrController extends Controller
{
    public function index(Request $request, ShowPerformanceContractRating $showPerformanceContractRating)
    {
       
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            $indicator = Indicator::select('sort')->groupBy('sort')->get();
            return view('pages.opcrpage.showopcr', compact('indicator', 'user'));
        }else {
            return redirect()->route('login');
        }
    }

}
