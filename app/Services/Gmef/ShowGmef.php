<?php

namespace App\Services\Gmef;

use App\Models\gmefquestionnaire;
use App\Models\gmeftool;
use App\Models\gmefscore;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToArray;

class ShowGmef
{
    public function execute()
    {
        $level = auth()->user()->level_id;
        $division = auth()->user()->division_id;
        $section = auth()->user()->section_id;

        $data = gmeftool::select(
            'tbl_gmef_tool.title', 
            'tbl_gmef_indicator.title_indi', 
            'tbl_gmef_indicator.title_parenthesis', 
            'tbl_gmef_indicator.tool_id', 
            'tbl_gmef_indicator.id as indicator_id') // Alias to avoid conflicts and for clarity
        ->leftJoin('tbl_gmef_indicator', 'tbl_gmef_indicator.tool_id', '=', 'tbl_gmef_tool.id')
        ->get();

        $data1 = $data->pluck('indicator_id')->toArray(); // Use the alias defined in the query

        $data2 = gmefquestionnaire::select('tbl_gmef_questionnaire.descriptors', 'tbl_gmef_questionnaire.desc_parenthesis','tbl_gmef_questionnaire.indicator_id')
                ->whereIn('tbl_gmef_questionnaire.indicator_id', $data1) // Use whereIn for multiple IDs
                ->orderBy('tbl_gmef_questionnaire.descriptors', 'asc')
                ->get();

        $data3 = $data2->pluck('id')->toArray();

        $data4 = gmefscore::select('tbl_gmef_score.score_desc', 'tbl_gmef_score.point')
                ->where('tbl_gmef_score.questionnaire_id', $data3)
                ->get();
        return [
            'indicator' => $data,
            'questionnaire' => $data2,
            'score' => $data4
        ];
    }
   
}
