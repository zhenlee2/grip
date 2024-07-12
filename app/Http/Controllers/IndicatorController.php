<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Indicator;
use App\Models\Users;

class IndicatorController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {
            $user = Users::findOrFail(auth()->id());
            return view('pages.indicator', compact('user'));
        }else {
            return redirect()->route('login');
        }
    }

    public function list(Request $request)
    {
        $filterOfficeId = $request->office_id == 0 ? NULL : $request->office_id;
        $filterParentId = $request->parent_id == 2 ? NULL : $request->parent_id;
        $filterTargetIndicatordesc = $request->target_indicator_desc;
        $filterQuantity = $request->quantity;
        $filterQuality = $request->quality;
        $filterTimeliness = $request->timeliness;

        //array sa imung attributes
        // imu ibutang sa select clause
        // select('DATE_FORMAT()')

        // $filterCountry = $request->country == 0 ? NULL : $request->country;
        $result = Indicator::where('target_indicator_desc', 'like', '%' . $filterTargetIndicatordesc . '%')
                            ->where('quantity', 'like', '%' . $filterQuantity . '%')
                            ->where('quality', 'like', '%' . $filterQuality . '%')
                            ->where('timeliness', 'like', '%' . $filterTimeliness . '%')
                            ->where('office_id', 'like', '%' . $filterOfficeId . '%')
                            ->where('parent_id', 'like', '%' . $filterParentId . '%')->get();
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
        $result = Indicator::find($request->id);
        $data = [
            "office_id" => $request->office_id,
            "target_indicator_desc" => $request->target_indicator_desc,
            "parent_id" => $request->parent_id,
            "quantity" => $request->quantity,
            "quality" => $request->quality,
            "timeliness" => $request->timeliness,
            "sub_weight_allocation" => $request->sub_weight_allocation,
            "sort" => $request->sort
        ];
        $result = $result->update($data);

        return json_encode($result);
    }
       // Store Function....
    public function store(Request $request)
    {
        $data = [
            "office_id" => $request->office_id,
            "target_indicator_desc" => $request->target_indicator_desc,
            "parent_id" => $request->parent_id,
            "quantity" => $request->quantity,
            "quality" => $request->quality,
            "timeliness" => $request->timeliness,
            "sub_weight_allocation" => $request->sub_weight_allocation,
            "sort" => $request->sort
        ];
        $result = Indicator::create($data);

        return json_encode($result);
    }
       // Delete Function....
    public function delete(Request $request)
    {
        $indicator = Indicator::find($request->id);
        $indicator->delete();

        return json_encode($indicator);
    }
}
