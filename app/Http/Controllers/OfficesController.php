<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offices;
use App\Models\Users;

class OfficesController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            return view('pages.offices',compact('user'));
        }else {
            return redirect()->route('login');
        }
    }

    public function list(Request $request)
    {
        $filterName = $request->name;
        $filterCode = $request->code;
        //$date = new DateTime($request->created_at);
        // $filtercreated = $request->created_at;
        // $filterupdated = $request->updated_at;
        $result = Offices::where('name', 'like', '%' . $filterName . '%')->where('code', 'like', '%' . $filterCode . '%')->get();
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
        $result = Offices::find($request->id);
        $data = [
            "name" => $request->name,
            "code" => $request->code
        ];
        $result = $result->update($data);

        return json_encode($result);
    }
       // Store Function....
    public function store(Request $request)
    {
        $data = [
            "name" => $request->name,
            "code" => $request->code
        ];
        $result = Offices::create($data);

        return json_encode($result);
    }
       // Delete Function....
    public function delete(Request $request)
    {
        $personnel = Offices::find($request->id);
        $personnel->delete();

        return json_encode($personnel);
    }
}
