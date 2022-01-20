<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddmissionConfimation extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='addmission_confirmations';
    protected $fillable=[
        'id',
        'addmission_id',
        'confirm_college_id',
        'confirm_round_id',
        'confirm_merit',
        'confirmation_type',
        'status'
    ];
    protected $hidden=['deleted_at'];

    public function admissionData()
    {
        return $this->belongsTo(Addmissions::class,'addmission_id');
    }

    public function collegeName()
    {
        return $this->belongsTo(College::class,'confirm_college_id');
    }

    public function roundDeclarationDate()
    {
        return $this->belongsTo(MeritRound::class,'confirm_round_id');
    }
}
