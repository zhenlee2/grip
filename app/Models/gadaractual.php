<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gadaractual extends Model
{
    protected $table = 'tbl_gadaractual';

    protected $fillable = [
        'gadar_id',
        'verify_id',
        'quarter',
        'physical_male',
        'physical_female',
        'physical_other',
        'physical_sextotal',
        'gadar_actualactivity',
        'tierone_actual',
        'tiertwo_actual',
        'total_actualexpen',
        'justification',
        'remark_secretariat',
    ];
}
