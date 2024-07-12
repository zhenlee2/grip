<?php

namespace App\Services\OfficePerformanceContractReview;

use App\Models\PerformanceContractReview;

use Illuminate\Support\Facades\DB;


class PerformanceContractRating
{
    public function execute($fields)
    {
        
        $indicator_id = $fields['pcindicator_id'];
        $review = PerformanceContractReview::find($indicator_id);
        // dd($fields['ratingaverage']),
        if ($review) {
            // DB::beginTransaction();

            $result = $review->update([
                'accom_indicator_desc' => $fields['targetIndicator'],
                'accom_quality' => $fields['quality'],
                'accom_quantity' => $fields['quantity'],
                'accom_timeliness' => $fields['timeliness'],
                'rating_quality' => $fields['qualityScore'],
                'rating_quantity' => $fields['quantityScore'],
                'rating_timeliness' => $fields['timelinessScore'],
                'rating_average' => $fields['rating_average'],
                'remarks' => $fields['remarks'],
            ]);
        }
        return $result;
    }

}
