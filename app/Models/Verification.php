<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    protected $table='verifications';

    protected $fillable=['user_id','code'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    // public function generateCode()
    // {
    //     $this->timestamps = false;

    //     $this->save();


    // }

}