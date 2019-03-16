<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $fillable = ['date', 'title', 'image', 'news', 'pinned'];
    
    protected $attributes = array(
        'pinned' => 0,
     );
}
