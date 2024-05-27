<?php

namespace Modules\Advertisements\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
            'image',
            'start_date',
            'end_date',
            'number_of_cleats',
            'advertisement_link',
    ];

   
}