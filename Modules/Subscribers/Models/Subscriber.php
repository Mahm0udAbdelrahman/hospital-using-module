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
    protected function getImageAttribute($value)
    {
        if ($value) {
            return asset('media/subscriber' . '/' . $value);
        } else {
            return asset('media/subscriber/default.png');
        }
    }

    public function setImageAttribute($value)
    {
        if ($value) {
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('media/subscriber/'), $imageName);
            $this->attributes['image'] = $imageName;
        }
    }
}