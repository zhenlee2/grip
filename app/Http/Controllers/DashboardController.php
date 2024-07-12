<?php

namespace App\Http\Controllers;

use App\Models\gadar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\gadarmov;
use App\Models\gadaractual;

use App\Services\Gadar\ShowGadar;
use DB;

class DashboardController extends Controller
{
    public function index(ShowGadar $showGadar)
    {
        if(Auth::check()) {

            $result = $showGadar->execute5();
            $result2 = $showGadar->execute6();
            $result3 = $showGadar->execute12();
            $totalBudget = $result3['totalBudget'];
            $totalExpenditure = $result3['totalExpenditure'];
            return view('dashboard.dashboard-02', compact('result', 'result2', 'totalBudget', 'totalExpenditure'));
        }else {
            return redirect()->route('login');
        }
    } 

}
