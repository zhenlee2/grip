<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gmefmov extends Model
{
    use HasFactory;

    protected $table = 'tbl_gmef_mov';

    protected $fillable = [
        'questionnaire_id',
        'instruction',
    ];
}
