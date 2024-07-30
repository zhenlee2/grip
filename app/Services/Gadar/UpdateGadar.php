<?php

namespace App\Services\Gadar;

use Illuminate\Support\Facades\Storage;
use App\Models\gadar;
use App\Models\gadarmov;
use App\Models\gadaractual;
use App\Models\submit;
use App\Models\Division;
use App\Models\Section;
// use Google\Service\Docs\Request;
use Illuminate\Http\Request;

class UpdateGadar
{
    public function execute(Request $request)
    {
        // $office = strtolower(str_replace(' ', '_', $request->input('division'))); // Normalized office
        // $section = strtolower(str_replace(' ', '_', $request->input('section'))); // Normalized section

        $level = auth()->user()->level_id;
        $division = auth()->user()->division_id;
        $section = auth()->user()->section_id;


        

        $gadar_id = $request->input('gadar_id');
        $quarter = $request->input('quarter');
        $year = $request->input('year');
        $actualmale = $request->input('actualmale');
        $actualfemale = $request->input('actualfemale');
        $actualother = $request->input('actualother');
        $totalactual = $request->input('totalactual');
        $actualActivity = $request->input('actualActivity');
        $actualtierone = $request->input('actualtierone');
        $actualtiertwo = $request->input('actualtiertwo');
        $actualtotalamount = $request->input('actualtotalamount');
        $justification = $request->input('justification');
        $remark_secretariat = $request->input('remark');
        $files = $request->file('files'); // This will return an array of files
        // $office = $request->input('division');
        // $section = $request->input('section');

        // if ($actualmale !== null || 
        //     $actualfemale !== null || 
        //     $actualActivity !== null || 
        //     $actualtierone !== null || 
        //     $actualtiertwo !== null ||  
        //     $justification !== null || 
        //     !empty($files)) {

            $division1 = Division::where('id', $division)->first();
            $divisionCode = $division1 ? $division1->code : 'default_division';
            
            $section1 = Section::where('id', $section)->first();
            $sectionCode = $section1 ? $section1->sec_code : 'default_section';
       
            // Create a base path based on user, office, and section
        $baseFilePath = "public/storage/GADAR/$year/$quarter/$divisionCode/$sectionCode";
                
                $gadar_id = $request->input('gadar_id'); // Get the input from the request

                // Attempt to find the record in the gadaractual table by its primary key
                $gadar = gadaractual::where('quarter', $quarter)->where('gadar_id', $gadar_id)->first();
                
                if($gadar === null){
                    $gadar = gadaractual::create([
                        'gadar_id' => $gadar_id,
                        'quarter' => $quarter,
                        'physical_male' => $actualmale,
                        'physical_female' => $actualfemale,
                        'physical_other' => $actualother,
                        'physical_sextotal' => $totalactual,
                        'gadar_actualactivity' => $actualActivity,
                        'tierone_actual' => $actualtierone,
                        'tiertwo_actual' => $actualtiertwo,
                        'total_actualexpen' => $actualtotalamount,
                        'justification' => $justification,
                        'remark_secretariat' => $remark_secretariat,
                    ]);
                
                    $getactual_id = $gadar->id;

                    if ($files) {
                        // Iterate through the array of files
                        foreach ($files as $file) {
                            // Process each file as needed
                            // For example, you can get the filename using $file->getClientOriginalName()
                
                            $filename = $file->getClientOriginalName();
                            
                            // Move the file to a specific location
                            $filesize = $file->getSize();

                            // Ensure the baseFilePath exists
                            Storage::makeDirectory($baseFilePath);
                            
                            $mov = gadarmov::create([
                                'gadaractual_id' => $getactual_id,
                                'file_name' => $filename,
                                'file_size' => $filesize,
                                'file_location' => $baseFilePath,
                                'division' => $division,
                                'section' => $section
                            ]);
                            if ($mov) $file->move(storage_path("app/$baseFilePath"), $filename);
                        }
                    }
                }else{
                    $gadar->update([
                        'quarter' => $quarter,
                        'physical_male' => $actualmale,
                        'physical_female' => $actualfemale,
                        'physical_other' => $actualother,
                        'physical_sextotal' => $totalactual,
                        'gadar_actualactivity' => $actualActivity,
                        'tierone_actual' => $actualtierone,
                        'tiertwo_actual' => $actualtiertwo,
                        'total_actualexpen' => $actualtotalamount,
                        'justification' => $justification,
                        'remark_secretariat' => $remark_secretariat,
                    ]);
                    $getactual_id = $gadar->id;

                    if ($files) {
                        // Iterate through the array of files
                        foreach ($files as $file) {
                            // Process each file as needed
                            // For example, you can get the filename using $file->getClientOriginalName()
                
                            $filename = $file->getClientOriginalName();
                            
                            // Move the file to a specific location
                            $filesize = $file->getSize();

                            // Ensure the baseFilePath exists
                            Storage::makeDirectory($baseFilePath);
                            
                            $mov = gadarmov::create([
                                'gadaractual_id' => $getactual_id,
                                'file_name' => $filename,
                                'file_size' => $filesize,
                                'file_location' => $baseFilePath,
                                'division' => $division,
                                'section' => $section
                            ]);
                            if ($mov) $file->move(storage_path("app/$baseFilePath"), $filename);
                        }
                    }
                }
            return response()->json(['message' => 'Data updated successfully'], 200);
        // } else {
        //     return response()->json(['error' => 'No data found in the request'], 500);
        // }
    }

    public function verify(Request $request) {
        // Log all request data
    
        // Extract input data
        $gadar_id = $request->input('id');
        $verify_id = $request->input('verify_id');
        $quarter = $request->input('quarter');
    
        // Log extracted data
        // Check if both gadar_id and verify_id are provided
        if (!$gadar_id || !$verify_id) {
            return response()->json(['message' => 'Missing required parameters'], 400);
        }
    
        // Perform the update
        $updateResult = Gadaractual::where('gadar_id', $gadar_id)
            ->where('quarter', $quarter)
            ->update(['verify_id' => $verify_id]);
    
        // Log update result
    
        // Check if the update was successful
        if ($updateResult) {
            return response()->json(['message' => 'Data updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to update data'], 500);
        }
    }

    public function submit(Request $request) {
        // Log all request data
    
        // Extract input data
        $year = $request->input('year');
        $quarter = $request->input('quarter');
        $division_id = $request->input('division_id');
        $submit_id = $request->input('submit_id');
       
       
        // Perform the update
        $submit = Submit::create([
            'year' => $year,
            'quarter' => $quarter,
            'division_id' => $division_id,
            'submit_id' => $submit_id
        ]);
        // Log update result
    
        // Check if the update was successful
        if ($submit) {
            return response()->json(['message' => 'Data updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to update data'], 500);
        }
    }
}