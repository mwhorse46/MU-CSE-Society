<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $fillable = ['name', 'image', 'role_id', 'mail', 'contact', 'address', 'session', 'work'];
}
