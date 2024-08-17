<?php

namespace App\Services\Gadar;

use App\Models\gadar;
use App\Models\gadaractual;
use App\Models\gadarmov;
use App\Models\gadartime;
use App\Models\submit;

use Google\Service\ContainerAnalysis\Justification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ShowGadar
{
    public function execute($selectedYear = Null, $selectedQuarter = Null)
    {
        // $division = session('user_division');
        // $section = session('user_section');
        

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

        foreach ($data as $key) {

            $gadarActual = gadaractual::select('id', 'created_at','tbl_gadaractual.created_at', 'quarter', 'verify_id', 'physical_male', 'physical_female', 'physical_other', 'physical_sextotal', 'gadar_actualactivity', 'tierone_actual', 'tiertwo_actual', 'total_actualexpen', 'justification', 'remark_secretariat')
                ->where('gadar_id', $key->id)
                ->where('quarter', $selectedQuarter)
                ->orderBy('tbl_gadaractual.created_at', 'desc') // Sort by created_at in ascending order
                ->first();

            $gadarMov = gadarmov::select('file_name', 'file_size', 'created_at', 'division', 'section')->where('gadaractual_id', $gadarActual->id ?? 0)->orderBy('tbl_gadarmov.created_at', 'asc')->get();
            // echo('<pre>');
            // print_r($gadarMov);
            // echo('</pre>');
            $movDetails = $gadarMov->map(function($mov) {
                return [
                    'file_name' => $mov->file_name,
                    'file_size' => $mov->file_size,
                    'created_at' => $mov->created_at,
                    'division' => $mov->division,
                    'section' => $mov->section
                ];
            })->toArray();

            

            $key->quarter = $gadarActual->quarter ?? null;
            $key->verify_id = $gadarActual->verify_id ?? null;
            $key->physical_male = $gadarActual->physical_male ?? null;
            $key->physical_female = $gadarActual->physical_female ?? null;
            $key->physical_other = $gadarActual->physical_other ?? null;
            $key->physical_sextotal = $gadarActual->physical_sextotal ?? null;
            $key->gadar_actualactivity = $gadarActual->gadar_actualactivity ?? null;
            $key->tierone_actual = $gadarActual->tierone_actual ?? null;
            $key->created_att = $gadarActual->created_at ?? null;
            $key->tiertwo_actual = $gadarActual->tiertwo_actual ?? null;
            $key->total_actualexpen = $gadarActual->total_actualexpen ?? null;
            $key->justification = $gadarActual->justification ?? null;
            $key->remark_secretariat = $gadarActual->remark_secretariat ?? null;
            // $key->mov = $gadarMov;
            $key->mov_details = $movDetails;
            // $key->file_size = $gadarMov->file_size ?? null;
            // $key->created_at = $gadarMov->created_at ?? null;
            // $key->division= $gadarMov->division ?? null;
            // $key->section = $gadarMov->section ?? null;
            

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

    // public function execute1()
    // {
    //     // $data = gadaractual::select(
    //     // // 'tbl_gadarmov.gadaractual_id','tbl_gadarmov.file_name','tbl_gadarmov.file_size','tbl_gadarmov.file_location', 'tbl_gadarmov.division', 'tbl_gadarmov.section',
    //     // 'tbl_gadaractual.physical_male', 'tbl_gadaractual.physical_female', 'tbl_gadaractual.physical_sextotal', 'tbl_gadaractual.gadar_actualactivity', 'tbl_gadaractual.tierone_actual', 'tbl_gadaractual.tiertwo_actual', 'tbl_gadaractual.total_actualexpen', 'tbl_gadaractual.created_at')
    //     // // 'tbl_gadar.id', 'tbl_gadar.gadartime_id', 'tbl_gadar.gadcategory_id', 'tbl_gadar.gadtotal_id', 'tbl_gadar.indicator_code', 'tbl_gadar.gad_mandate', 'tbl_gadar.result_indicator', 'tbl_gadar.prev_remark', 'tbl_gadar.prev_male', 'tbl_gadar.prev_female', 'tbl_gadar.prev_budget', 'tbl_gadar.prev_totalsex', 'tbl_gadar.target_male', 'tbl_gadar.target_female', 'tbl_gadar.target_totalsex', 'tbl_gadar.pap_desc', 'tbl_gadar.pap_code', 'tbl_gadar.gad_activity', 'tbl_gadar.budget_tierone', 'tbl_gadar.budget_tiertwo', 'tbl_gadar.budget_totalamount', 'tbl_gadar.source', 'tbl_gadar.responsible_unit',)
    //     // // ->leftJoin('tbl_gadaractual', 'tbl_gadaractual.gadar_id', '=', 'tbl_gadar.id')
    //     // // ->leftJoin('tbl_gadarmov', 'tbl_gadarmov.gadaractual_id', '=', 'tbl_gadaractual.id')
    //     // // ->leftJoin('lib_activity', 'lib_activity.id', '=', 'pc.activity_id')
    //     // // ->leftJoin('category', 'category.id', '=', 'lib_activity.category_id')
    //     // // ->leftJoin('users','users.id', '=', 'pc.user_id')
    //     // // ->where('pc.year', '=', $year)
    //     // ->get();

    //     return $data;
    // }

    public function execute2()
    {
        $data = gadarmov::select('tbl_gadarmov.gadaractual_id','tbl_gadarmov.file_name','tbl_gadarmov.file_size','tbl_gadarmov.file_location', 'tbl_gadarmov.division', 'tbl_gadarmov.section')
        ->get();
        return $data;
    }

    public function execute3($selectedYear = '2024', $division)
    {
        $data = gadar::select(
        // 'tbl_gadarmov.gadaractual_id','tbl_gadarmov.file_name','tbl_gadarmov.file_size','tbl_gadarmov.file_location', 'tbl_gadarmov.division', 'tbl_gadarmov.section',
        'tbl_gadaractual.quarter', 'tbl_gadaractual.physical_male', 'tbl_gadaractual.physical_female', 'tbl_gadaractual.physical_other', 'tbl_gadaractual.physical_sextotal', 'tbl_gadaractual.gadar_actualactivity', 'tbl_gadaractual.tierone_actual', 'tbl_gadaractual.tiertwo_actual', 'tbl_gadaractual.total_actualexpen', 'tbl_gadaractual.justification',
        'tbl_gadar.id', 'tbl_gadar.gadartime_id', 'tbl_gadar.gadcategory_id', 'tbl_gadar.gadtotal_id', 'tbl_gadar.indicator_code', 'tbl_gadar.gad_mandate', 'tbl_gadar.result_indicator', 'tbl_gadar.prev_remark', 'tbl_gadar.prev_male', 'tbl_gadar.prev_female', 'tbl_gadar.prev_budget', 'tbl_gadar.prev_totalsex', 'tbl_gadar.target_male', 'tbl_gadar.target_female', 'tbl_gadar.target_totalsex', 'tbl_gadar.pap_desc', 'tbl_gadar.pap_code', 'tbl_gadar.gad_activity', 'tbl_gadar.budget_tierone', 'tbl_gadar.budget_tiertwo', 'tbl_gadar.budget_totalamount', 'tbl_gadar.source', 'tbl_gadar.responsible_unit', 'tbl_gadar.unit',
        'tbl_gadartime.year')
        ->leftJoin('users', 'users.division', '=', 'tbl_gadar.responsible_unit')
        ->leftJoin('tbl_gadaractual', 'tbl_gadaractual.gadar_id', '=', 'tbl_gadar.id')
        ->leftJoin('tbl_gadartime', 'tbl_gadartime.id','=', 'tbl_gadar.gadartime_id')
        ->where('tbl_gadartime.year', '=', $selectedYear)
        ->where('users.division', '=', $division)
        ->get();
        return $data;
    }

    public function execute4()
    {
        $data = gadartime::select('tbl_gadartime.year')
        ->get();
        return $data;
        
    }
    // Count the Indicator per office
    public function execute5($selectedYear = '2024')
    {
        $data = gadar::select(
            'tbl_gadar.responsible_unit',
            DB::raw('COUNT(DISTINCT tbl_gadar.indicator_code) as indicator_count')
        )
        ->leftJoin('tbl_gadaractual', 'tbl_gadaractual.gadar_id', '=', 'tbl_gadar.id')
        ->leftJoin('tbl_gadartime', 'tbl_gadartime.id','=', 'tbl_gadar.gadartime_id')
        ->where('tbl_gadartime.year', '=', $selectedYear)
        ->groupBy('tbl_gadar.responsible_unit')
        ->orderByDesc('indicator_count')
        ->get();
        return $data;
    }


    public function execute6($selectedYear = '2024')
    {
        $data = DB::table('tbl_gadar')
        ->select('responsible_unit', 'rawresponsible_unit', DB::raw('COUNT(*) as count'))
        ->leftJoin('tbl_gadaractual', 'tbl_gadaractual.gadar_id', '=', 'tbl_gadar.id')
        ->leftJoin('tbl_gadartime', 'tbl_gadartime.id','=', 'tbl_gadar.gadartime_id')
        ->whereNull('tbl_gadaractual.gadar_id') // Check if the gadar_id is null in tbl_gadaractual
        ->where('tbl_gadartime.year', '=', $selectedYear)
        ->groupBy('responsible_unit') // Group by responsible_unit to get distinct values
        ->orderByDesc('count')
        ->get();

    return $data;
    }
        // End of Count the Indicator per office

    public function execute7($selectedYear = '2024', $division)
    {

        $data = gadar::select('tbl_gadar.id', 'tbl_gadartime.year')
        ->leftJoin('users', 'users.division', '=', 'tbl_gadar.responsible_unit')
        ->leftJoin('tbl_gadartime', 'tbl_gadartime.id','=', 'tbl_gadar.gadartime_id')
        ->where('tbl_gadartime.year', '=', $selectedYear)
        ->where('users.division', '=', $division)
        ->get();

        $dataIds = $data->pluck('id')->toArray();

        $data1 = Gadaractual::select('tbl_gadaractual.id')
        ->whereIn('gadar_id', $dataIds)
        ->get();

        $data1Ids = $data1->pluck('id')->toArray();

        $children = Gadarmov::select('tbl_gadarmov.created_at', 'tbl_gadar.indicator_code', 'tbl_gadar.responsible_unit', 'tbl_gadarmov.file_size', 'tbl_gadarmov.file_name')
            ->leftJoin('tbl_gadaractual', 'tbl_gadarmov.gadaractual_id', '=', 'tbl_gadaractual.id')
            ->leftJoin('tbl_gadar', 'tbl_gadaractual.gadar_id', '=', 'tbl_gadar.id')
            ->whereIn('tbl_gadarmov.gadaractual_id', $data1Ids)
            ->orderBy('tbl_gadarmov.created_at')
            ->get();

        return $children;
    }

        // LOGS
    public function execute8($selectedYear = '2024', $division)
    {
        $data = gadar::select('tbl_gadar.id', 'tbl_gadartime.year')
            ->leftJoin('users', 'users.division', '=', 'tbl_gadar.responsible_unit')
            ->leftJoin('tbl_gadartime', 'tbl_gadartime.id','=', 'tbl_gadar.gadartime_id')
            ->where('tbl_gadartime.year', '=', $selectedYear)
            ->where('users.division', '=', $division)
            ->get();

        // Extracting IDs from $data collection
        $dataIds = $data->pluck('id')->toArray();

        // Querying Gadaractual records using the extracted IDs
        $children = Gadaractual::select('tbl_gadaractual.created_at', 'tbl_gadar.responsible_unit', 'tbl_gadar.rawresponsible_unit', 'tbl_gadar.indicator_code', 'tbl_gadaractual.gadar_actualactivity', 'tbl_gadaractual.justification')
            ->leftJoin('tbl_gadar', 'tbl_gadar.id', '=', 'tbl_gadaractual.gadar_id')
            ->whereIn('gadar_id', $dataIds)
            ->where(function($query) {
                $query->whereNotNull('tbl_gadaractual.gadar_actualactivity')
                    ->orWhereNotNull('tbl_gadaractual.justification');
            })
            ->orderBy('tbl_gadaractual.created_at')
            ->get();

        return $children;
    }

    public function execute9($selectedYear = Null, $selectedQuarter = Null)
    {
        $gadarStatus = Submit::select('tbl_submit.year', 'tbl_submit.quarter', 'tbl_submit.division_id', 'tbl_submit.submit_id', 'tbl_submit.created_at', 'lib_division.code')->leftjoin('lib_division','lib_division.id', '=', 'tbl_submit.division_id')->where('year', $selectedYear)->where('quarter', $selectedQuarter)->get();;

        return $gadarStatus;
    }

    public function execute10($selectedYear = null, $selectedQuarter = null)
{
    $level = auth()->user()->level_id;
    $division = auth()->user()->division_id;
    $section = auth()->user()->section_id;

    $response = [];

    $gadars = gadar::select(
            'tbl_gadar.id', 'tbl_gadar.indicator_code', 'tbl_gadar.rawresponsible_unit', 
            'tbl_gadar.unit', 'tbl_gadar.responsible_unit', 'tbl_gadaractual.created_at'
        )
        ->leftjoin('tbl_gadaractual', 'tbl_gadaractual.gadar_id', '=', 'tbl_gadar.id')
        ->leftJoin('tbl_gadartime', 'tbl_gadar.gadartime_id', '=', 'tbl_gadartime.id')
        ->where('tbl_gadaractual.quarter', $selectedQuarter)
        ->where('tbl_gadartime.year', $selectedYear)
        ->orderBy('tbl_gadaractual.created_at', 'desc')
        ->get();

    foreach ($gadars as $gadar) {
        // Decode JSON fields
        $division_arr = $gadar->responsible_unit ? json_decode($gadar->responsible_unit) : [];
        $section_arr = $gadar->unit ? json_decode($gadar->unit) : [];

        // Check level and responsible units before adding to response
        if ($level == 1 && in_array($section, $section_arr)) {
            $response[] = $gadar;
        } else if ($level == 2 && in_array($division, $division_arr)) {
            $response[] = $gadar;
        } else if ($level == 3) {
            $response[] = $gadar;
        }
    }

    return $response;
}

    public function execute12($selectedYear = '2024')
    {
        // Calculate total budget
        $totalBudget = gadar::leftjoin('tbl_gadartime', 'tbl_gadartime.id', '=', 'tbl_gadar.gadartime_id')
            ->where('tbl_gadartime.year', '=', $selectedYear)
            ->sum('tbl_gadar.budget_totalamount');
        
        // Format total budget
        $formattedBudget = '₱' . number_format($totalBudget, 2, '.', ','); // Format to 2 decimal places, using '.' as decimal separator and ',' as thousands separator
        
        // Calculate total actual expenditure
        $totalExpenditure = gadaractual::select(
            DB::raw('SUM(tbl_gadaractual.total_actualexpen) AS total_expenditure')
                )
                ->leftJoin('tbl_gadar', 'tbl_gadaractual.gadar_id', '=', 'tbl_gadar.id')
                ->leftJoin('tbl_gadartime', 'tbl_gadar.gadartime_id', '=', 'tbl_gadartime.id')
                ->where('tbl_gadartime.year', '=', $selectedYear)
                ->value('total_expenditure');

        // Format total actual expenditure
        $formattedExpenditure = '₱' . number_format($totalExpenditure, 2, '.', ','); // Format to 2 decimal places, using '.' as decimal separator and ',' as thousands separator
        
        // Return both formatted budget and expenditure
        return [
            'totalBudget' => $formattedBudget,
            'totalExpenditure' => $formattedExpenditure
        ];
    }
}
