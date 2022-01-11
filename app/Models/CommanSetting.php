<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommanSetting extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='common_settings';
    protected $fillable=[
        'id',
        'subject_id',
        'marks'
    ];
    protected $hidden=['deleted_at'];

}
