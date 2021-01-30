<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = ['value'];
    protected $hidden = ['translations'];
    protected $fillable = ['parent_id' , 'slug' , 'is_active'];
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
