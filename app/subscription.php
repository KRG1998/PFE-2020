<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
    protected $fillable = ['user_id','name','type','duration', 'price', 'description'];
}
