<?php

namespace App\Http\Controllers;

use App\Models\gadar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\gadarmov;
use App\Models\gadaractual;

use App\Services\Gadar\ShowGadar;
use App\Services\Gadar\SaveGadar;
use App\Services\Gadar\UpdateGadar;

use App\Exports\GadarDataExport;
use Maatwebsite\Excel\Facades\Excel;

class GadarController extends Controller
{
    public function index($year,$quarter, Request $request, ShowGadar $showGadar)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
           
                $division = $user->division; // User Division
                $selectedYear = $year;
                $selectedQuarter = $quarter;
                $gadar = $showGadar->execute($year,$quarter);
                $filteryear = $showGadar->execute4();
                $gadarStatus = $showGadar->execute9($year,$quarter);
                $gadarlog = $showGadar->execute10($year); //GADAR Log
                return view('pages.gadar.gadar',compact('user','gadar', 'selectedYear', 'selectedQuarter', 'filteryear','gadarStatus', 'gadarlog'));
        }else {
            return redirect()->route('login');
        }
    }

    public function upload(Request $request, UpdateGadar $updateGadar) 
    {

        $response = $updateGadar->execute($request);
        
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

    public function filterData(Request $request, ShowGadar $showGadar)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            $selectedYear = $request->input('year');
            $selectedQuarter = $request->input('quarter');
            $gadar = $showGadar->execute();
            // $gadar = gadar::all();
            return view('pages.gadar.gadar',compact('user','gadar', 'selectedYear'));
        }else {
            return redirect()->route('login');
        }
    }

    public function save(Request $request, SaveGadar $savegadar)
    {
        $data = $savegadar->execute($request);

        if(!$data){
            return response()->json([                
                'status' => "error",
                'description' => "Error encountered: failed to save",
            ],404);
        }
        
        return response()->json([                
            'status' => "success",
            'description' => "Successfully save indicator",
            'data' => $data
        ],200);
    }
    
    public function verify(Request $request, UpdateGadar $updategadar)
    {
        $data = $updategadar->verify($request);
        
        if(!$data){
            return response()->json([                
                'status' => "error",
                'description' => "Error encountered: failed to save",
            ],404);
        }
        
        return response()->json([                
            'status' => "success",
            'description' => "Successfully save indicator",
            'data' => $data
        ],200);
    }

    public function submit(Request $request, UpdateGadar $updategadar)
    {
        $data = $updategadar->submit($request);
        
        if(!$data){
            return response()->json([                
                'status' => "error",
                'description' => "Error encountered: failed to save",
            ],404);
        }
        
        return response()->json([                
            'status' => "success",
            'description' => "Successfully save indicator",
            'data' => $data
        ],200);
    }

    public function export($year = null, $quarter = null) 
    {
        return Excel::download(new GadarDataExport($year, $quarter), 'GAD Accomplishment Report.xlsx');
    }
}
