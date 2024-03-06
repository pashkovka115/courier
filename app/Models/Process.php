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
        'day_week',
        'earned',
        'salary',
        'bonus',
        'tea',
        'park_commission',
        'gasoline_from_account',
        'gasoline_for_cash',
        'spare_parts',
        'comments',
        'created_at',
        'updated_at',
    ];
}
