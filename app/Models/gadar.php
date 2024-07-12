<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gadar extends Model
{
    protected $table = 'tbl_gadar';

    protected $fillable = [
        'gadartime_id',
        'gadcategory_id',
        'gadtotal_id',
        'gad_mandate',
        'result_indicator',
        'prev_remark',
        'prev_male',
        'prev_female',
        'prev_budget',
        'prev_totalsex',
        'target_male',
        'target_female',
        'target_totalsex',
        'pap_desc',
        'pap_code',
        'gad_activity',
        'budget_tierone',
        'budget_tiertwo',
        'budget_totalamount',
        'source',
        'responsible_unit',
        'unit',
        'rawresponsible_unit',
        'justification',
        'remark_secretariat',
    ];
    
}
