<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'lib_section';

    protected $fillable = [
        'division_id',
        'sec_name',
        'sec_code',
    ];
}
