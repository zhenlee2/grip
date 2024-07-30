<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gmefactualmov extends Model
{
    use HasFactory;
    protected $table = 'tbl_gmef_actualmov';

    protected $fillable = [
        'questionnaire_id',
        'year',
        'actual_mov_one',
        'actual_mov_two',
        'actual_mov_three',
        'date_issued',
        'user_id',
        'division_id',
        'section_id',
    ];
}
