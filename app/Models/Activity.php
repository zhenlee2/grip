<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'lib_activity';

    protected $fillable = [
        'name',
        'discription',
        'category_id',
    ];
}
