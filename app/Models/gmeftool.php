<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gmeftool extends Model
{
    use HasFactory;

    protected $table = 'tbl_gmef_tool';

    protected $fillable = [
        'title',
        'additional_title',
    ];
}
