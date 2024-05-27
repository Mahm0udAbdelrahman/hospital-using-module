<?php

namespace Modules\Subscribers\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Subscribers\Database\Factories\SubscriberFactory;

class Subscriber extends Model
{
    use HasFactory;
    protected $fillable = [
        'the_organization' ,
            'name'     ,
            'email'     ,
            'address'     ,
            'image'      ,
            'phone'     ,
            'facebook'     ,
            'instagram'
    ];

    protected static function newFactory()
    {
        return SubscriberFactory::new();
    }
}