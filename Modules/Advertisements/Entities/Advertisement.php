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
    protected function getImageAttribute($value)
    {
        if ($value) {
            return asset('media/ads' . '/' . $value);
        } else {
            return asset('media/ads/default.png');
        }
    }

    public function setImageAttribute($value)
    {
        if ($value) {
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('media/ads/'), $imageName);
            $this->attributes['image'] = $imageName;
        }
    }

}