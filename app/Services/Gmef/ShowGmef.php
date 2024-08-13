<?php

namespace App\Services\Gmef;
use Illuminate\Support\Facades\Log;

use App\Models\gmefquestionnaire;
use App\Models\gmeftool;
use App\Models\gmefscore;
use App\Models\gmefmov;
use App\Models\movtitle;
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
            'tbl_gmef_tool.title as tool_title', 
            'tbl_gmef_indicator.title_indi', 
            'tbl_gmef_indicator.title_parenthesis', 
            'tbl_gmef_indicator.tool_id', 
            'tbl_gmef_indicator.id as indicator_id'
        )
        ->leftJoin('tbl_gmef_indicator', 'tbl_gmef_indicator.tool_id', '=', 'tbl_gmef_tool.id')
        ->get();
    
        $indicatorIds = $data->pluck('indicator_id')->toArray();
    
    // Step 2: Retrieve data from gmefquestionnaire
    $questionnaires = gmefquestionnaire::select('id as questionnaire_id', 'descriptors', 'desc_parenthesis', 'indicator_id')
        ->whereIn('indicator_id', $indicatorIds)
        ->orderBy('descriptors', 'asc')
        ->get();
    
        $questionnaireIds = $questionnaires->pluck('questionnaire_id')->toArray();
    
    // Step 3: Retrieve data from gmefscore
    $scores = gmefscore::select('score_desc', 'point', 'questionnaire_id')
        ->whereIn('questionnaire_id', $questionnaireIds)
        ->get();
    
        $scoresByQuestionnaire = $scores->groupBy('questionnaire_id');
    
    // Step 4: Retrieve data from gmefmov
    $instruction = gmefmov::select('id as mov_id', 'instruction', 'instruc_parenthesis', 'questionnaire_id')
        ->whereIn('questionnaire_id', $questionnaireIds)
        ->get();

        $movesByInstruction = $instruction->groupBy('questionnaire_id');

        $moveIds = $instruction->pluck('mov_id')->toArray();
    
    // Step 5: Retrieve data from movtitle
    $movTitles = movtitle::select('id as movtitle_id', 'table_title', 'gmefmov_id')
        ->whereIn('gmefmov_id', $moveIds)
        ->get();
        
        $movesByQuestionnaire = $movTitles->groupBy('gmefmov_id');
    
    // Step 6: Merge moves and their titles
    // $moves = $moves->map(function($move) use ($movTitlesByMov) {
    //     $move->titles = $movTitlesByMov->get($move->mov_id, collect());
    //     return $move;
    // });
   
    $mergedData = $questionnaires->map(function($questionnaire) use ($scoresByQuestionnaire, $movesByInstruction, $movesByQuestionnaire) {
        $scores = $scoresByQuestionnaire->get($questionnaire->questionnaire_id, collect());
        $instruction = $movesByInstruction->get($questionnaire->questionnaire_id, collect());
        $moves = $movesByQuestionnaire->get($questionnaire->questionnaire_id, collect());
        $questionnaire->scores = $scores;
        $questionnaire->instruction = $instruction;
        $questionnaire->moves = $moves;
    
        return $questionnaire;
    });
    

        return [
            'indicator' => $data,
            'questionnaire' => $mergedData,
            // 'movtitle'=> $mergedmovtitle,
        ];
    }
   
}