<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $hidden = ["created_at","updated_at","product_unit_id"];

    protected $guarded = [];
    public function unit()
    {
        return $this->belongsTo(ProductUnit::class,'product_unit_id');
    }
}
