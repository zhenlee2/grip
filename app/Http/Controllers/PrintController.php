<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Indicator;
use App\Models\Category;

use App\Models\Users;


use App\Services\OfficePerformanceContract\CreatePerformanceContract;
use App\Services\OfficePerformanceContract\ShowPerformanceContract;

class PrintController extends Controller
{
    public function index(Request $request, ShowPerformanceContract $showPerformanceContract)
    {
        if(Auth::check()) {
            $year = $request->year;
            $semester = $request->semester;
            $user = Users::findOrFail(auth()->id());
            $category = Category::all();
            $data = $showPerformanceContract->execute($year, $semester);
            $indicator = Indicator::select('sort')->groupBy('sort')->get();
            // return dd($category);
            return view('pages.opcpage.officepcPrint', compact('category', 'indicator', 'data', 'user'));
        }else {
            return redirect()->route('login');
        }
    }

}
