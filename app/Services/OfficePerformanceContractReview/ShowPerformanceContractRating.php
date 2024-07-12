<?php

namespace App\Services\OfficePerformanceContractReview;

use App\Models\PerformanceContractReview;


class ShowPerformanceContractRating
{
    public function execute($id)
    {
        // dd($id);
        $data = PerformanceContractReview::select('pcr.id', 'pcr.pcindicator_id','pcr.accom_indicator_desc', 'pcr.accom_quality', 'pcr.accom_quantity', 'pcr.accom_timeliness', 'pcr.rating_quality', 'pcr.rating_quantity', 'pcr.rating_timeliness', 'pcr.remarks')
        ->where('pcr.pcindicator_id', '=', $id)
        ->first();

        // dd($data);
        // $data = PerformanceContractReview::all();
        // dd('Hello');
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
