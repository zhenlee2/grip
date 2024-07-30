<?php

namespace App\Services\Gadgpb;

use App\Models\gadar;
use App\Models\gadaractual;
use App\Models\gadarmov;
use App\Models\gadartime;
use App\Models\submit;

use Google\Service\ContainerAnalysis\Justification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ShowGadgpb
{
    public function execute($selectedYear = Null)
    {

        $level = auth()->user()->level_id;
        $division = auth()->user()->division_id;
        $section = auth()->user()->section_id;

        $response = [];

        $data = gadar::select(
        'tbl_gadar.id', 'tbl_gadar.created_at', 'tbl_gadar.gadartime_id', 'tbl_gadar.rawresponsible_unit', 'tbl_gadar.gadcategory_id', 'tbl_gadar.gadtotal_id', 'tbl_gadar.indicator_code', 'tbl_gadar.gad_mandate', 'tbl_gadar.result_indicator', 'tbl_gadar.prev_remark', 'tbl_gadar.prev_male', 'tbl_gadar.prev_female', 'tbl_gadar.prev_budget', 'tbl_gadar.prev_totalsex', 'tbl_gadar.target_male', 'tbl_gadar.target_female', 'tbl_gadar.target_totalsex', 'tbl_gadar.pap_desc', 'tbl_gadar.pap_code', 'tbl_gadar.gad_activity', 'tbl_gadar.budget_tierone', 'tbl_gadar.budget_tiertwo', 'tbl_gadar.budget_totalamount', 'tbl_gadar.source', 'tbl_gadar.responsible_unit', 'tbl_gadar.unit',
        'tbl_gadartime.year')
        // ->leftJoin('tbl_gadaractual', 'tbl_gadaractual.gadar_id', '=', 'tbl_gadar.id')
        ->leftjoin('tbl_gadartime', 'tbl_gadartime.id','=', 'tbl_gadar.gadartime_id')
        ->where('tbl_gadartime.year', '=', $selectedYear)
        // ->where('tbl_gadaractual.quarter', '=', $selectedQuarter)
        ->get();

        // foreach ($data as $key) {

        //     $gadarActual = gadaractual::select('id', 'created_at','tbl_gadaractual.created_at', 'quarter', 'verify_id', 'physical_male', 'physical_female', 'physical_other', 'physical_sextotal', 'gadar_actualactivity', 'tierone_actual', 'tiertwo_actual', 'total_actualexpen', 'justification', 'remark_secretariat')
        //         ->where('gadar_id', $key->id)
        //         ->where('quarter', $selectedQuarter)
        //         ->orderBy('tbl_gadaractual.created_at', 'desc') // Sort by created_at in ascending order
        //         ->first();

        //     $gadarMov = gadarmov::select('file_name', 'file_size', 'created_at', 'division', 'section')->where('gadaractual_id', $gadarActual->id ?? 0)->orderBy('tbl_gadarmov.created_at', 'asc')->get();
        //     // echo('<pre>');
        //     // print_r($gadarMov);
        //     // echo('</pre>');
        //     $movDetails = $gadarMov->map(function($mov) {
        //         return [
        //             'file_name' => $mov->file_name,
        //             'file_size' => $mov->file_size,
        //             'created_at' => $mov->created_at,
        //             'division' => $mov->division,
        //             'section' => $mov->section
        //         ];
        //     })->toArray();

            

        //     $key->quarter = $gadarActual->quarter ?? null;
        //     $key->verify_id = $gadarActual->verify_id ?? null;
        //     $key->physical_male = $gadarActual->physical_male ?? null;
        //     $key->physical_female = $gadarActual->physical_female ?? null;
        //     $key->physical_other = $gadarActual->physical_other ?? null;
        //     $key->physical_sextotal = $gadarActual->physical_sextotal ?? null;
        //     $key->gadar_actualactivity = $gadarActual->gadar_actualactivity ?? null;
        //     $key->tierone_actual = $gadarActual->tierone_actual ?? null;
        //     $key->created_att = $gadarActual->created_at ?? null;
        //     $key->tiertwo_actual = $gadarActual->tiertwo_actual ?? null;
        //     $key->total_actualexpen = $gadarActual->total_actualexpen ?? null;
        //     $key->justification = $gadarActual->justification ?? null;
        //     $key->remark_secretariat = $gadarActual->remark_secretariat ?? null;
        //     // $key->mov = $gadarMov;
        //     $key->mov_details = $movDetails;
            // $key->file_size = $gadarMov->file_size ?? null;
            // $key->created_at = $gadarMov->created_at ?? null;
            // $key->division= $gadarMov->division ?? null;
            // $key->section = $gadarMov->section ?? null;
            
            foreach ($data as $key) {
                $division_arr = $key->responsible_unit ? json_decode($key->responsible_unit) : [];
                $section_arr = $key->unit ? json_decode($key->unit) : [];

                if ($level == 1 && in_array($section, $section_arr)) {
                    array_push($response, $key);
                } else if($level == 2 && in_array($division, $division_arr)) {
                    array_push($response, $key);
                } else if($level == 3) {
                    array_push($response, $key);
                }
            }
        
        return $response;
    }

    public function execute4()
    {
        $data = gadartime::select('tbl_gadartime.year')
        ->get();
        return $data;
        
    }
}
