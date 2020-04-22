<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ad extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['client_id','title', 'category', 'subcategory', 'description', 'jobbers_number', 'photos', 'date', 'hour', 'address', 'phone', 'duration','hour_wage', 'amount','state'];
}
