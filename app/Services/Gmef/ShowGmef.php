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

        $data2 = gmefquestionnaire::select('id', 'tbl_gmef_questionnaire.descriptors', 'tbl_gmef_questionnaire.desc_parenthesis', 'tbl_gmef_questionnaire.indicator_id')
                ->whereIn('tbl_gmef_questionnaire.indicator_id', $data1)
                ->orderBy('tbl_gmef_questionnaire.descriptors', 'asc')
                ->get();

                // Step 2: Pluck the ids from the retrieved data
        $data3 = $data2->pluck('id')->toArray();

                // Step 3: Retrieve data from gmefscore based on the plucked ids
        $data4 = gmefscore::select('tbl_gmef_score.score_desc', 'tbl_gmef_score.point', 'tbl_gmef_score.questionnaire_id')
                ->whereIn('tbl_gmef_score.questionnaire_id', $data3)
                ->get();

        $scoresByQuestionnaire = $data4->groupBy('questionnaire_id');

        $mergedData = $data2->map(function($questionnaire) use ($scoresByQuestionnaire) {
            $questionnaire->scores = $scoresByQuestionnaire->get($questionnaire->id, collect());
            return $questionnaire;
        });

        return [
            'indicator' => $data,
            'questionnaire' => $mergedData,
        ];
    }
   
}
