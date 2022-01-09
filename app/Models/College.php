<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class College extends Authenticatable
{
    use HasFactory;
    protected $guard='college';
    protected $table='colleges';
    protected $fillable=[
        'id',
        'name',
        'email',
        'contact_no',
        'address',
        'password',
        'logo',
        'status'
    ];
}
