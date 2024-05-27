<?php

namespace Modules\Subscriptions\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function subscription()
    {
       return  $this->hasMany(Subscription::class,'package_id','id');
    }


}