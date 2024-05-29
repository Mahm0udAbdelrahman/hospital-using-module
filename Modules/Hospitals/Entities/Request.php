<?php

namespace Modules\Hospitals\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'date',
        'descrtiption'
    ];


}