<?php

namespace App\Services\Gadgpb;

use Illuminate\Support\Facades\Storage;
use App\Models\gadar;
use App\Models\gadarmov;
use App\Models\gadaractual;
// use Google\Service\Docs\Request;
use Illuminate\Http\Request;

class UpdateGadgpb
{
    public function execute(Request $request)
    {
        $gadar_id = $request->input('gadar_id');
        $mandate = $request->input('mandate');
        $result = $request->input('result');
        $activity = $request->file('activity'); // This will return an array of files
        $division = $request->input('dataDiv');
        $section = $request->input('dataSec');
        $justification = $request->input('justification');
        $remark = $request->input('remark');
        $rawunit = $request->input('rawunit');

        $gadar = Gadar::find($gadar_id);

        if (!$gadar) {
            return response()->json(['message' => 'Gadar record not found'], 404);
        }
            $changes = [];
            // Compare each input value with the existing value and add to changes array if different
            if ($gadar->gad_mandate != $mandate) {
                $changes['gad_mandate'] = $mandate;
            }
            if ($gadar->result_indicator != $result) {
                $changes['result_indicator'] = $result;
            }
            if ($gadar->gad_activity != $activity) {
                $changes['gad_activity'] = $activity;
            }
            if ($gadar->responsible_unit != $division) {
                $changes['responsible_unit'] = $division;
            }
            if ($gadar->unit != $section) {
                $changes['unit'] = $section;
            }
            if ($gadar->justification != $justification) {
                $changes['justification'] = $justification;
            }
            if ($gadar->remark_secretariat != $remark) {
                $changes['remark_secretariat'] = $remark;
            }
            if ($gadar->rawresponsible_unit != $rawunit) {
                $changes['rawresponsible_unit'] = $rawunit;
            }
        
            // Check if there are any changes to update
            if (!empty($changes)) {
                $gadar->update($changes);
                return response()->json(['message' => 'Gadar record updated successfully']);
            }
    }
}
