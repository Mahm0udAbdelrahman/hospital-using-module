<?php

namespace Modules\Blogs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class,'section_id','id');
    }

}