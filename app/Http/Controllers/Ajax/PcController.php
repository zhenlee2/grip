<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Indicator;
use App\Models\Offices;
use App\Models\PerformanceContract;


class PcController extends Controller
{
    public function get_activity($id)
    {
        $activity = Activity::where('category_id', $id)->get();
        return $activity;
    }
    public function get_indicator($id)
    {
        $indicator = Indicator::select('indicator.*', 'lib_office.name')->leftJoin('lib_office', 'lib_office.id', '=', 'indicator.office_id')->where('indicator.sort', $id)->get();
        return $indicator;
    }
    public function save_indicator(Request $request)
    {
        $data = $data = [
            "activity_id" => $request->activity_id,
            "sort" => $request->indicator_code,
            "target_indicator_desc"=> $request->indicator
        ];
        $office = PerformanceContract::create($data);

        return $office;
    }

    
}
