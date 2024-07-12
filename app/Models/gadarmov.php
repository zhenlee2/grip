<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gadarmov extends Model
{
    protected $table = 'tbl_gadarmov';

    protected $fillable = [
        'gadaractual_id',
        'file_name',
        'file_size',
        'file_location',
        'office_id',
        'division',
        'section',
    ];
}
