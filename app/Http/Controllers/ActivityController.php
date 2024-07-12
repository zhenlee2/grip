<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\Users;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            return view('pages.activity', compact('user'));
        }else {
            return redirect()->route('login');
        }
    }

    public function list(Request $request)
    {
        $filterName = $request->name;
        $filterDiscription = $request->discription;
        $filterCategoryID = $request->category_id == 0 ? NULL : $request->category_id;
        // $filtercreated = $request->created_at;
        // $filterupdated = $request->updated_at;
        // $filterCountry = $request->country == 0 ? NULL : $request->country;
        $result = Activity::where('name', 'like', '%' . $filterName . '%')->where('category_id', 'like', '%' . $filterCategoryID. '%')->where('discription', 'like', '%' . $filterDiscription. '%')->get();
        //->where('address', 'like', '%' . $filterAddress . '%')->where('country', 'like', '%' . $filterCountry . '%')->get();
        $data = [
            "count" => count($result),
            "results" => $result
        ];
        return json_encode($data);
    }
        //Update Funcition....
     public function update(Request $request)
    {
        $result = Activity::find($request->id);
        $data = [
            "name" => $request->name,
            "discription" => $request->discription,
            "category_id"=> $request->category_id
        ];
        $result = $result->update($data);

        return json_encode($result);
    }
       // Store Function....
    public function store(Request $request)
    {
        $data = [
            "name" => $request->name,
            "discription" => $request->discription,
            "category_id"=> $request->category_id
        ];
        $result = Activity::create($data);

        return json_encode($result);
    }
       // Delete Function....
    public function delete(Request $request)
    {
        $personnel = Activity::find($request->id);
        $personnel->delete();

        return json_encode($personnel);
    }
}
