<?php

namespace App\Tokoku;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model 
{

    protected $table = 'warehouse';
    public $timestamps = true;
    protected $fillable = array('name');

}