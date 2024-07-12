<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System_configuration extends Model
{
    protected $table = 'system_configuration';

    protected $fillable = [
        'head',
        'name',
        'semester',
        'year',
        'section',
        'division',
    ];
}
