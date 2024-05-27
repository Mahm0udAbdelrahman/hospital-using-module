<?php

namespace Modules\Cities\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Cities\Database\factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Countries\Models\Country;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');

    }



    protected static function newFactory()
    {
        return CityFactory::new();
    }
}