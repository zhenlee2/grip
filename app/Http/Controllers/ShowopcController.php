<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Indicator;
use App\Models\Category;

use App\Models\Users;


use App\Services\OfficePerformanceContract\CreatePerformanceContract;
use App\Services\OfficePerformanceContract\ShowPerformanceContract;
use App\Services\OfficePerformanceContract\UpdatePerformanceContract;
use App\Services\OfficePerformanceContract\DeletePerformanceContract;
use SebastianBergmann\Environment\Console;

class ShowopcController extends Controller
{
    // public function index(Request $request)
    // {

    //     if(Auth::check()) {
    //         $category = Category::all();
    //         $data = $showPerformanceContract->execute();
    //         $indicator = Indicator::select('sort')->groupBy('sort')->get();
    //         return view('pages.opcpage.showopc', compact('category', 'indicator', 'data'));
    //     }else {
    //         return redirect()->route('login');
    //     }
    // }
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
            return view('pages.opcpage.showopc', compact('category', 'indicator', 'data', 'user', 'year', 'semester'));
        }else {
            return redirect()->route('login');
        }
    }

    public function save_indicator(Request $request, CreatePerformanceContract $createPerformanceContract)
    {
        $response = $createPerformanceContract->execute($request);

        if(!$response){
            return response()->json([                
                'status' => "error",
                'description' => "Error encountered: failed to save",
            ],404);
        }
        
        return response()->json([                
            'status' => "success",
            'description' => "Successfully save indicator",
            'data' => $response
        ],200);
    }

    public function update_indicator(Request $request, UpdatePerformanceContract $updatePerformanceContract)
    {
        $response = $updatePerformanceContract->execute($request);

        if(!$response){
            return response()->json([                
                'status' => "error",
                'description' => "Error encountered: failed to save",
            ],404);
        }
        
        return response()->json([                
            'status' => "success",
            'description' => "Successfully save indicator",
            'data' => $response
        ],200);
    }

    public function delete_indicator(Request $request, DeletePerformanceContract $deletePerformanceContract)
    {
        $response = $deletePerformanceContract->execute($request);

        if(!$response){
            return response()->json([                
                'status' => "error",
                'description' => "Error encountered: failed to save",
            ],404);
        }
        
        return response()->json([                
            'status' => "success",
            'description' => "Successfully save indicator",
            'data' => $response
        ],200);
    }
    
}
