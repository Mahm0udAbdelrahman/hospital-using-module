<?php

namespace Modules\Blogs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'section_id',
       'title',
        'description',
       'image',
       'date',
       'editor'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }


}