<?php

namespace Modules\Countries\Models;

use Modules\Cities\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Countries\Database\factories\CountryFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected static function newFactory()
    {
        return CountryFactory::new();
    }
    public function cities()
    {
        return $this->hasMany(City::class,'country_id','id');

    }
}