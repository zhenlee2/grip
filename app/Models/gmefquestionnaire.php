<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gmefquestionnaire extends Model
{
    use HasFactory;

    protected $table = 'tbl_gmef_questionnaire';

    protected $fillable = [
        'indicator_id',
        'descriptors',
    ];
}
