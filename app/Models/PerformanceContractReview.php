<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerformanceContractReview extends Model
{
    // use HasFactory;

    protected $table = 'pcr';

    protected $fillable = [
        'indicator_id',
        'pcindicator_id',
        'accom_indicator_desc',
        'accom_quality',
        'accom_quantity',
        'accom_timeliness',
        'rating_quality',
        'rating_quantity',
        'rating_timeliness',
        'rating_average',
        'remarks',
    ];
}
