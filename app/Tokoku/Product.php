<?php

namespace App\Tokoku;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'product';
    public $timestamps = true;
    protected $fillable = array('name', 'code', 'measure_id', 'price', 'warn_stock');
    protected $hidden = array('id', 'measure_id','created_at','updated_at');

    public function measure()
    {
        return $this->belongsTo('App\Tokoku\Measure','measure_id');
    } 
}