<?php

namespace App\Services\OfficePerformanceContract;

use App\Models\PCIndicator;
use App\Models\PerformanceContract;
use App\Models\PerformanceContractReview;

use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class DeletePerformanceContract
{

    public function execute($fields)
    {
        $data = $fields['id'];
        
        $flag = true;

        // DB::beginTransaction();
        $deletedPCIndicators = PCIndicator::whereIn('id', $data)->select('pc_id')->pluck('pc_id')->toArray();
        $deletedPCIndicatorreviews = PerformanceContractReview::whereIn('id', $data)->select('pcindicator_id')->pluck('pcindicator_id')->toArray();
        // dd($deletedPCIndicatorreviews);
    // $delete = PCIndicator::whereIn('id', $fields['id'])->delete();

    // dd($deletedPCIndicators);
    // $pcIndicatorIds = $deletedPCIndicators-
    //  dd($pcIndicatorIds);
    // Select data from another table (let's assume the other table is called 'OtherTable')
    $getdata = PerformanceContract::whereIn('id', $deletedPCIndicators)->delete();
    $delete = PCIndicator::whereIn('id', $data)->delete();
    $deleteReview = PerformanceContractReview::whereIn('id', $deletedPCIndicatorreviews)->delete();
    
    
    if ($getdata || $delete || $deleteReview) {
        // Deletions were successful, return a success response
        return response()->json(['message' => 'Deletions successful'], 200);
    } else {
        // Deletions were not successful, return an error response
        return response()->json(['message' => 'Deletions failed'], 500);
    }
    }
    
}
