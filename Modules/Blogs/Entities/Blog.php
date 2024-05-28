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
    protected function getImageAttribute($value)
    {
        if ($value) {
            return asset('media/blog' . '/' . $value);
        } else {
            return asset('media/blog/default.png');
        }
    }

    public function setImageAttribute($value)
    {
        if ($value) {
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('media/blog/'), $imageName);
            $this->attributes['image'] = $imageName;
        }
    }


}