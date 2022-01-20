<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollegeCourse extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='college_courses';
    protected $fillable=[
        'id',
        'college_id',
        'course_id',
        'seat_no',
        'reserved_seat',
        '   '
    ];

    public function courseName()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function collegeName()
    {
        return $this->belongsTo(College::class,'college_id');
    }
    protected $hidden=['deleted_at'];
}
