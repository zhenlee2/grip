<?php

namespace App\Services\User;

use App\Models\Users;


use Illuminate\Support\Facades\DB;

class UserAccount
{
    public function execute()
    {
        $data = Users::all();
        // select('users.id', 'users.fname', 'users.lname')
        // $data = Users::select('users.id', 'users.fname', 'users.lname', 'pc_indicator.id', 'lib_activity.name', 'pc_indicator.sub_weight_allocation', 'pc_indicator.sort', 'pc_indicator.target_indicator_desc', 'pc_indicator.quality', 'pc_indicator.quantity', 'pc_indicator.timeliness', 'pc_indicator.alloted_budget', 'pc_indicator.accountability_center', 'category.indicator_id')
        // ->leftJoin('pc', 'pc.id', '=', 'pc_indicator.pc_id')
        // ->leftJoin('lib_activity', 'lib_activity.id', '=', 'pc.activity_id')
        // ->leftJoin('category', 'category.id', '=', 'lib_activity.category_id')
        // ->leftJoin('users','users.id', '=', 'user_info.user_id')
        // ->get();
        return $data;
    }

}
