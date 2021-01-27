<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = ['value'];
    public $timestamps = false;
    protected $fillable = ['key' , 'is_translatable' , 'plain_value'];

    protected $casts = [
        'is_translatable' => 'boolean',
    ];
}
