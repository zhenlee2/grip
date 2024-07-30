<?php

namespace App\Http\Controllers;

use App\Http\Requests\GadgpbUpdateRequest;
use App\Models\gadar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Section;
use App\Models\Division;
use App\Services\Gadgpb\UpdateGadgpb;
use App\Services\Gadgpb\ShowGadgpb;

class GadgpbController extends Controller
{
    public function index($year, Request $request,ShowGadgpb $showGadgpb)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            $selectedYear = $year;
            $gadar = $showGadgpb->execute($year);
            $filteryear = $showGadgpb->execute4();
            // $gadar = gadar::all();
            $section = Section::all();
            $division = Division::all();
            return view('pages.gadgpb.gadgpb',compact('user','gadar','section', 'division', 'filteryear', 'selectedYear'));
        }else {
            return redirect()->route('login');
        }
    }

    public function upload(Request $request, UpdateGadgpb $updateGadgpb)
    {
        $response = $updateGadgpb->execute($request);
        
        if(!$response){
            return response()->json([                
                'status' => "error",
                'description' => "Error encountered: failed to save",
            ],404);
        }
        
        return response()->json([                
            'status' => "success",
            'description' => "Successfully save indicator",
            'data' => $response,
        ],200);
    }
}
