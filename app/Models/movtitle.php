<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movtitle extends Model
{
    use HasFactory;
    protected $table = 'tbl_gmef_movtitle';

    protected $fillable = [
        'gmefmov_id',
        'table_title',
    ];
}
