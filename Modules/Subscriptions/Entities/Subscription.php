<?php

namespace Modules\Subscriptions\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
class Subscription extends Model
{
    use HasFactory;
    use  Notifiable;

    protected $fillable = [
        'package_id',
        'payment_system',
        'the_currency',
        'prefix',
        'price',
    ];

    public function package()
    {
        return  $this->belongsTo(Package::class,'package_id','id');
    }


}