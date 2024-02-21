<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $table = 'processes';
//    public $timestamps = false;
    protected $fillable = [
        'date',
        'earned',
        'salary',
        'park_commission',
        'gasoline_from_account',
        'gasoline_for_cash',
        'spare_parts',
        'created_at',
        'updated_at',
    ];
}
