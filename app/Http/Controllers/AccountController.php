<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            return view('pages.user.useraccount', compact('user'));
        }else {
            return redirect()->route('login');
        }
    }

    public function list(Request $request)
    {
        $filterRole = $request->role_id;
        $filterFName = $request->fname;
        $filterLName = $request->lname;
        $filterDivision = $request->division;
        $filterSection = $request->section;
        $filterUsername = $request->username;
        $filterPassword = $request->password;
        $result = Users::where('role_id', 'like', '%' . $filterRole . '%')
        ->where('fname', 'like', '%' . $filterFName . '%')
        ->where('lname', 'like', '%' . $filterLName . '%')
        ->where('division', 'like', '%' . $filterDivision . '%')
        ->where('section', 'like', '%' . $filterSection . '%')
        ->where('username', 'like', '%' . $filterUsername . '%')
        ->where('password', 'like', '%' . $filterPassword . '%')
        ->get();
        //->where('address', 'like', '%' . $filterAddress . '%')->where('country', 'like', '%' . $filterCountry . '%')->get();
        $data = [
            "count" => count($result),
            "results" => $result
        ];
        return json_encode($data);
    }
        //Update Funcition....
    //  public function update(Request $request)
    // {
    //     $result = Users::find($request->id);
    //     $data = [
    //         "name" => $request->name,
    //         "discription" => $request->discription,
    //         "category_id"=> $request->category_id
    //     ];
    //     $result = $result->update($data);

    //     return json_encode($result);
    // }
    //    // Store Function....
    // public function store(Request $request)
    // {
    //     $data = [
    //         "name" => $request->name,
    //         "discription" => $request->discription,
    //         "category_id"=> $request->category_id
    //     ];
    //     $result = Users::create($data);

    //     return json_encode($result);
    // }
    //    // Delete Function....
    // public function delete(Request $request)
    // {
    //     $personnel = Users::find($request->id);
    //     $personnel->delete();

    //     return json_encode($personnel);
    // }
}
