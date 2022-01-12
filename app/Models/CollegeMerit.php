<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollegeMerit extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='college_merits';
    protected $fillable=[
        'id',
        'college_id',
        'course_id',
        'merit_round_id',
        'merit',
    ];
    protected $hidden=['deleted_at'];
}
