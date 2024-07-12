<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Section;
use App\Models\Users;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            return view('pages.section',compact('user'));
        }else {
            return redirect()->route('login');
        }
    }

    public function list(Request $request)
    {
        $filtersecName = $request->sec_name;
        $filtersecCode = $request->sec_code;
        $filterDivisionID = $request->division_id == 0 ? NULL : $request->division_id;
        //$date = new DateTime($request->created_at);
        // $filtercreated = $request->created_at;
        // $filterupdated = $request->updated_at;
        $result = Section::where('sec_name', 'like', '%' . $filtersecName . '%')->where('sec_code', 'like', '%' . $filtersecCode . '%')->where('division_id', 'like', '%' . $filterDivisionID . '%')->get();
        // ->where('created_at', 'like', '%' . $filtercreated . '%')->get();
        $data = [
            "count" => count($result),
            "results" => $result
        ];
        return json_encode($data);
    }
        //Update Funcition....
     public function update(Request $request)
    {
        $result = Section::find($request->id);
        $data = [
            "division_id" => $request->division_id,
            "sec_name" => $request->sec_name,
            "sec_code" => $request->sec_code
        ];
        $result = $result->update($data);

        return json_encode($result);
    }
       // Store Function....
    public function store(Request $request)
    {
        $data = [
            "division_id" => $request->division_id,
            "sec_name" => $request->sec_name,
            "sec_code" => $request->sec_code
        ];
        $result = Section::create($data);

        return json_encode($result);
    }
       // Delete Function....
    public function delete(Request $request)
    {
        $personnel = Section::find($request->id);
        $personnel->delete();

        return json_encode($personnel);
    }
}
