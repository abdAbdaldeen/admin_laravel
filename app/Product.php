<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public $primaryKey = 'product_id';
    public $timestamps = true;

    public function getCategory (){
        return $this->belongsTo('App\Category','category_id','product_id');
    }
}