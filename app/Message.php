<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public $fillable = ['name', 'email', 'message'];
    
    protected $attributes = array(
        'read_status' => 0,
     );
}
