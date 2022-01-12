<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addmissions extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='addmissions';
    protected $fillable=[
        'id',
        'user_id',
        'college_id',
        'addmission_date',
        'addmission_code',
        'status'
    ];

    protected $hidden=['deleted_at'];
}
