<?php

namespace App;

use App\Notifications\ClientApply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Offer extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['ad_id', 'client_id', 'title', 'duration', 'amount', 'cover_letter','description','state'];

   
}
