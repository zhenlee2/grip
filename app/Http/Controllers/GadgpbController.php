<?php

namespace App\Http\Controllers;

use App\Models\gadar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Section;
use App\Models\Division;
use App\Services\Gadgpb\UpdateGadgpb;
// use App\Services\Gadar\UpdateGadar;

class GadgpbController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            // $gadar = $showGadar->execute3($year, $division);
            $gadar = gadar::all();
            $section = Section::all();
            $division = Division::all();
            return view('pages.gadgpb.gadgpb',compact('user','gadar','section', 'division'));
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
