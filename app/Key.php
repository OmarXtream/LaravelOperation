<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = ['key','by','photo'];
    protected $hidden = ['created_at','updated_at'];
}
