<?php

namespace App\Services\OfficePerformanceContract;

use App\Models\PCIndicator;
use App\Models\PerformanceContract;
use App\Models\PCIndicatorTrack;

use Illuminate\Support\Facades\DB;


class UpdatePerformanceContract
{

    public function execute($field)
    {
        

        // Find the record before the update
        $originalRecord = PCIndicator::find($field['id']);

        // Update the record
        $response = $originalRecord->update([
            'target_indicator_desc' => $field['target'],
            'quantity' => $field['quantity'],
            'quality' => $field['quality'],
            'timeliness' => $field['timeliness'],
            'sub_weight_allocation' => $field['sub'],
            'sort' => $field['sort'],
            'alloted_budget' => $field['alloted'],
            'accountability_center' => $field['center'],
            'remarks' => $field['target']
        ]);

        // Check if any changes were made
        if ($response && $originalRecord->wasChanged()) {
            return $response;
            // Changes were made
            // Additional actions can be taken if needed
        } else {
            // No changes or update was not successful
            return false;
        }

        // You can return $response or any other information you need
        // return $response;

    }

    
}
