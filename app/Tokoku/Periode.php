<?php

namespace App\Tokoku;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model 
{

    protected $table = 'periode';
    public $timestamps = true;
    protected $fillable = array('name', 'active');

}