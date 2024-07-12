<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;
    protected $table = 'tbl_submit';

    protected $fillable = [
        'year',
        'quarter',
        'division_id',
        'submit_id',
    ];
}
