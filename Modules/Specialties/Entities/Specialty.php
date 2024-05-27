<?php

namespace Modules\Specialties\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public function subspecialties()
    {
        return $this->hasMany(Subspecialty::class,'specialty_id','id');
    }

    protected static function newFactory()
    {
        return \Modules\Specialties\Database\factories\SpecialtyFactory::new();
    }
}