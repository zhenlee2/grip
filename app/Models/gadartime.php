<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gadartime extends Model
{
    protected $table = 'tbl_gadartime';

    protected $fillable = [
        'year',
        'semester',
        'quarter',
    ];
}
