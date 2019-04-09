<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $fillable = ['albumName'];

    protected $attributes = array(
        'coverImage' => "no-image-available.jpg",
     );
}
