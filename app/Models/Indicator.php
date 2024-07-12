<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $table = 'indicator';

    protected $fillable = [
        
        'office_id',
        'target_indicator_desc',
        'parent_id',
        'quantity',
        'quality',
        'timeliness',
        'sub_weight_allocation',
        'sort',
    ];
}
