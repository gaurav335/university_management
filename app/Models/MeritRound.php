<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeritRound extends Model
{
    use HasFactory;
    protected $table='merit_rounds';
    protected $fillable=[
        'id',
        'start_date',
        'end_date',
        'merit_result_declare_date'
    ];
}
