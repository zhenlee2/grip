<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Users;
use App\Models\Indicator;
use App\Models\Category;
use App\Models\PerformanceContractReview;

use App\Services\OfficePerformanceContractReview\PerformanceContractRating;
use App\Services\OfficePerformanceContractReview\ShowPerformanceContractRating;
use App\Services\OfficePerformanceContract\ShowPerformanceContract;

class OfficereviewController extends Controller
{
    public function index(ShowPerformanceContract $showPerformanceContract)
    {
        if(Auth::check()) {
            $list = DB::select('SELECT pc1.*, CONCAT(users.fname, " ", users.lname) AS fullname FROM (SELECT MAX(pc.id) AS true_id, pc.year, pc.semester, COUNT(pci.indicator_id) AS total_indicator, pc.created_at FROM pc LEFT JOIN pc_indicator AS pci ON pci.pc_id = pc.id GROUP BY pc.year, pc.semester) AS pc1 JOIN pc AS pc2 ON pc2.id = pc1.true_id JOIN users ON users.id = pc2.user_id;');
            return view('pages.opcrpage.officepcr', compact('list'));
        }else {
            return redirect()->route('login');
        }
    }   

    
    public function showpcr($year, $semester, ShowPerformanceContract $showPerformanceContract, ShowPerformanceContractRating $showPerformanceContractRating)
    {
        // $data1 = $showPerformanceContractRating->execute();
        $data = $showPerformanceContract->execute($year, $semester);
        $collectedData = [];
        $data1 = [];
        foreach ($data as $dataC) {
            $collectedData[] = $dataC->id;
            // $data1[] = $showPerformanceContractRating->execute($dataC->id);
        }
        foreach ($collectedData as $id) {
            // $collectedData[] = $dataC->id;
            $data1[] = $showPerformanceContractRating->execute($id);
        }
        // $data1 = $showPerformanceContractRating->execute($collectedData);
        // dd($data1);
       
        $user = Users::findOrFail(auth()->id());
        return view('pages.opcrpage.showopcr', compact('data', 'user', 'year', 'semester', 'data1'));
    }

    public function save_rating(Request $request, PerformanceContractRating $PerformanceContractRating)
    {
        $response = $PerformanceContractRating->execute($request);

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
