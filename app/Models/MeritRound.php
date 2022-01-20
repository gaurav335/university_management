<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeritRound extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='merit_rounds';
    protected $fillable=[
        'id',
        'round_no',
        'course_id',
        'start_date',
        'end_date',
        'merit_result_declare_date',
        'admission_confirm_date'
    ];
    protected $hidden=['deleted_at'];

}
