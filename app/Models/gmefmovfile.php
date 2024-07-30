<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gmefmovfile extends Model
{
    use HasFactory;

    protected $table = 'tbl_gmefmov_file';

    protected $fillable = [
        'actualmov_id',
        'file_name',
        'file_path',
        'file_size',
        'file_type',
        'user_id',
        'division_id',
        'section_id',
    ];
}
