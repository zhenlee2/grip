<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gmefscore extends Model
{
    use HasFactory;

    protected $table = 'tbl_gmef_score';

    protected $fillable = [
        'questionnaire_id',
        'score_no_desc',
        'score_partly_desc',
        'score_yes_desc',
        'point_no',
        'point_partly',
        'point_yes',
    ];
}
