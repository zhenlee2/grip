<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gadtotal extends Model
{
    protected $table = 'tbl_gadtotal';

    protected $fillable = [
        'sub_totalbudget',
        'grand_totalbudget',
    ];
}
