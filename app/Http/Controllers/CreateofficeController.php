<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PerformanceContract;
use App\Models\Offices;
use App\Models\Indicator;
use App\Models\Category;
use App\Models\Users;
use App\Models\PCIndicator;

use App\Services\OfficePerformanceContract\CreatePerformanceContract;
use App\Services\OfficePerformanceContract\ShowPerformanceContract;
use App\Services\OfficePerformanceContract\UpdatePerformanceContract;


class CreateofficeController extends Controller
{

    public function createpc(ShowPerformanceContract $showPerformanceContract)
    {

        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            $category = Category::all();
            $data = $showPerformanceContract->execute();
            $indicator = Indicator::select('sort')->groupBy('sort')->get();
            $list = DB::select('SELECT pc1.*, CONCAT(users.fname, " ", users.lname) AS fullname FROM (SELECT MAX(pc.id) AS true_id, pc.year, pc.semester, COUNT(pci.indicator_id) AS total_indicator, pc.created_at FROM pc LEFT JOIN pc_indicator AS pci ON pci.pc_id = pc.id GROUP BY pc.year, pc.semester) AS pc1 JOIN pc AS pc2 ON pc2.id = pc1.true_id JOIN users ON users.id = pc2.user_id;');
            return view('pages.opcpage.officepc', compact('category', 'indicator', 'user', 'list', 'data'));
        }else {
            return redirect()->route('login');
        }
    }
    
    public function save_indicator(Request $request,  CreatePerformanceContract $createPerformanceContract)
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

    
    public function showpc($year, $semester, ShowPerformanceContract $showPerformanceContract)
    {
        $data = $showPerformanceContract->execute($year, $semester);
        $user = Users::findOrFail(auth()->id());
        return view('pages.opcpage.showopc', compact('data', 'user', 'year', 'semester'));
    }

}
