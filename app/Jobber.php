<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobber extends Model
{
    protected $fillable =['user_id', 'description', 'address', 'gender', 'birthday', 'phone','photo','professional_status'];
}
