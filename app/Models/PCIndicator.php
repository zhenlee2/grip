<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCIndicator extends Model
{
    protected $table = 'pc_indicator';

    protected $fillable = [
        'indicator_id',
        'pc_id',
        'target_indicator_desc',
        'quantity',
        'quality',
        'timeliness',
        'sub_weight_allocation',
        'sort',
        'alloted_budget',
        'accountability_center',
        'remarks'
    ];
}
