<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gmefindicator extends Model
{
    use HasFactory;

    protected $table = 'tbl_gmef_indicator';

    protected $fillable = [
        'tool_id',
        'title',
    ];
}
