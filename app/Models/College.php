<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class College extends Authenticatable
{
    use HasFactory,SoftDeletes;
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
    protected $hidden=['deleted_at'];

    public function getLogoAttribute($value)
    {
      return $value ? asset('storage/college-logo' . '/' . $value):NULL;

    }

}
