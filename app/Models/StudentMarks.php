<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentMarks extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='student_marks';
    protected $fillable=[
        'id',
        'user_id',
        'subject_id',
        'total_mark',
        'obtain_mark',
    ];
    protected $hidden=['deleted_at'];

    public function subjectid()
    {
        return $this->belongsTo(Subject::class,'subject_id');

    }
}
