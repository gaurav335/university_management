<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Universitie extends Authenticatable
{
    use HasFactory;
    protected $guard='admin';
    protected $table='universities';
    protected $fillable=[
        'id',
        'name',
        'email',
        'contact_no',
        'address',
        'password'
    ];
}
