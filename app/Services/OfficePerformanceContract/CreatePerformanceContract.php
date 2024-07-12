<?php

namespace App\Services\OfficePerformanceContract;

use App\Models\PCIndicator;
use App\Models\PerformanceContract;
use App\Models\PCIndicatorTrack;
use App\Models\PerformanceContractReview;

use Illuminate\Support\Facades\DB;


class CreatePerformanceContract
{
    public function execute($fields)
    {
        $data = $fields['data'];

        $flag = true;

        DB::beginTransaction();

        // $currentMonth = date('m');

        // if ($currentMonth >= 1 && $currentMonth <= 6) {
        //     $pc = PerformanceContract::create([
        //         'user_id' => auth()->user()->id,
        //         'year' => now()->year,
        //         'semester' => '1',
        //         // 'activity_id' => $data[$i]['activity_id'],
        //     ]);
        // } elseif ($currentMonth >= 7 && $currentMonth <= 12) {
        //     $pc = PerformanceContract::create([
        //         'user_id' => auth()->user()->id,
        //         'year' => now()->year,
        //         'semester' => '2',
        //         // 'activity_id' => $data[$i]['activity_id'],
        //     ]);
        // }

        // !$pc ?? $flag = false;

        // $pctrack = PCIndicatorTrack::create([
        //     'pc_id' => $pc->id
        // ]);

        // !$pctrack ?? $flag = false;

        // $currentMonth = date('m');

        // if ($currentMonth >= 1 && $currentMonth <= 6) {
        //     $pc = PerformanceContract::create([
        //         'user_id' => auth()->user()->id,
        //         'year' => now()->year,
        //         'semester' => '1',
        //         'activity_id' => $data[$i]['activity_id'],
        //     ]);
        // } elseif ($currentMonth >= 7 && $currentMonth <= 12) {
            
        // }

        for ($i=0; $i < count($data); $i++) { 
            
            $pc = PerformanceContract::create([
                'user_id' => auth()->user()->id,
                'year' => $data[$i]['year'],
                'semester' => $data[$i]['semester'],
                'activity_id' => $data[$i]['activity_id'],
            ]);
    
            !$pc ?? $flag = false;
    
            $pctrack = PCIndicatorTrack::create([
                'pc_id' => $pc->id
            ]);
    
            !$pctrack ?? $flag = false;

            if (isset($data[$i]['indicator'])) {
                for ($j=0; $j < count($data[$i]['indicator']); $j++) { 
                    $indicator = PCIndicator::create([
                        'pc_id' => $pc->id,
                        'sort' => $data[$i]['indicator_code'],
                        'sub_weight_allocation' => $data[$i]['weight'][$j],
                        'indicator_id' => $data[$i]['indicator'][$j],
                        'target_indicator_desc' => $data[$i]['target'][$j],
                        'quality' => $data[$i]['qual'][$j],
                        'quantity' => $data[$i]['quan'][$j],
                        'timeliness' => $data[$i]['time'][$j],
                        'alloted_budget' => $data[$i]['budget_alloted'][$j],
                        'accountability_center' => $data[$i]['office'][$j]
                    ]);
    
                    !$indicator ?? $flag = false;

                    $pcr = PerformanceContractReview::create([
                        'pcindicator_id' => $indicator->id
                    ]);

                    !$pcr ?? $flag = false;

                }
            }
    
            if ($flag) {
                DB::commit();
            } else {
                DB::rollBack();
            }
    
        }

        return $flag;

    }
}
