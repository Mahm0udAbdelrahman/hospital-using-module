<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sick extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'age',
        'country',
        'city',
       'description_disease',
    ];


}
