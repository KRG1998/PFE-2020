<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =['user_id', 'description', 'address', 'gender', 'birthday', 'phone','photo'];
}
