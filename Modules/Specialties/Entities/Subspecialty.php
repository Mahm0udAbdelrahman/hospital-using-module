<?php

namespace Modules\Specialties\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subspecialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialty_id',
        'name',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class,'specialty_id','id');
    }

    protected static function newFactory()
    {
        return \Modules\Specialties\Database\factories\SubspecialtyFactory::new();
    }
}