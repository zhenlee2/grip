<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gmefactualscore extends Model
{
    use HasFactory;

    protected $table = 'tbl_gmef_actualscore';

    protected $fillable = [
        'questionnaire_id',
        'year',
        'actual_score_desc',
        'actual_point',
    ];
}
