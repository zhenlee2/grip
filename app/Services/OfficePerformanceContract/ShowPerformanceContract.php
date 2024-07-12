<?php

namespace App\Services\OfficePerformanceContract;

use App\Models\PCIndicator;


class ShowPerformanceContract
{
    public function execute($year = '2023', $semester = '1')
    {
        
        $data = PCIndicator::select('users.id', 'users.fname', 'users.lname', 'pc_indicator.id', 'lib_activity.name', 'pc.year', 'pc.semester', 'pc_indicator.sub_weight_allocation', 'pc_indicator.sort', 'pc_indicator.target_indicator_desc', 'pc_indicator.quality', 'pc_indicator.quantity', 'pc_indicator.timeliness', 'pc_indicator.alloted_budget', 'pc_indicator.accountability_center', 'category.indicator_id', 'pcr.accom_indicator_desc', 'pcr.accom_quality', 'pcr.accom_quantity', 'pcr.accom_timeliness', 'pcr.rating_quality', 'pcr.rating_quantity', 'pcr.rating_timeliness', 'pcr.rating_average', 'pcr.remarks')
        ->leftJoin('pcr', 'pcr.pcindicator_id', '=', 'pc_indicator.id')
        ->leftJoin('pc', 'pc.id', '=', 'pc_indicator.pc_id')
        ->leftJoin('lib_activity', 'lib_activity.id', '=', 'pc.activity_id')
        ->leftJoin('category', 'category.id', '=', 'lib_activity.category_id')
        ->leftJoin('users','users.id', '=', 'pc.user_id')
        ->where('pc.year', '=', $year)
        ->where('pc.semester', '=', $semester)
        ->get();
        return $data;
    }

    // public function execute()
    // {
    //     $indicator = new PCIndicator;
    //     $data = $indicator::performance_contract()
    //     ->leftJoin('pc', 'pc.id', '=', 'pc_indicator.pc_id')
    //     ->leftJoin('lib_activity', 'lib_activity.id', '=', 'pc.activity_id')
    //     ->leftJoin('category', 'category.id', '=', 'lib_activity.category_id')
    //     ->get();
    //     return $data;
    // }
}
