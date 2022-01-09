<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommanSetting extends Model
{
    use HasFactory;
    protected $table='common_settings';
    protected $fillable=[
        'id',
        'subject_id',
        'marks'
    ];
}
