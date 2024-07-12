<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCIndicatorTrack extends Model
{
    protected $table = 'indicator_track';

    protected $fillable = [
        'pc_id',
    ];
}
