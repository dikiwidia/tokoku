<?php

namespace App\Tokoku;

use Illuminate\Database\Eloquent\Model;

class Store extends Model 
{

    protected $table = 'store';
    public $timestamps = true;
    protected $fillable = array('name', 'address', 'email', 'phone', 'logo');

}