<?php

namespace App\Services\Gadar;

use App\Models\gadar;
use App\Models\gadaractual;
use App\Models\gadarmov;
use App\Models\gadartime;
use Illuminate\Http\Request;

class SaveGadar
{
    public function execute(Request $request)
    {
        $temp = "1";
        $year = $request->input('year');
        $addppa = $request->input('addppa');
        $addgadmanadate = $request->input('addgadmanadate');
        $addindicator = $request->input('addindicator');
        $addpapdesc = $request->input('addpapdesc');
        $addpapid = $request->input('addpapid');
        // $addactualact = $request->input('addactualact');
        // $addactualtierone = $request->input('addactualtierone');
        // $addactualtiertwo = $request->input('addactualtiertwo');
        // $addactualtotalamount = $request->input('addactualtotalamount');
        $addjustification = $request->input('addjustification');
        $addsource = $request->input('addsource');
        $addremark = $request->input('addremark');
        $adddivision = $request->input('adddivision');
        $addsection = $request->input('addsection');
        $yearid = Gadartime::where('year', $year)->pluck('id')->first();

        if($addgadmanadate && $addindicator && $addppa !== 0 && $adddivision && $addsection){
            
            $data = gadar::create([
                'gadartime_id' => $yearid,
                'gadcategory_id' => $addppa,
                'gad_mandate' => $addgadmanadate,
                'result_indicator' => $addindicator,
                'pap_desc' => $addpapdesc,
                'pap_code' => $addpapid,
                'source' => $addsource,
                'justification' => $addjustification,
                'remark_secretariat' => $addremark,
                'responsible_unit' => $adddivision,
                'unit' => $addsection,
                'additional' => $temp,
            ]);
        }
        // $data = gadaractual::create([
        //     'gadar_actualactivity' => $addactualact,
        //     'tierone_actual' => $addactualtierone,
        //     'tiertwo_actual' => $addactualtiertwo,
        //     'total_actualexpen' => $addactualtotalamount,
        //     'justification' => $addjustification,
        // ]);
           
        return $data;
    }
}
