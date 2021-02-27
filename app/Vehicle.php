<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Parts;

class Vehicle extends Model
{

    protected $guarded = [];
    public function parts(){
        return $this->hasMany(Parts::class,'vehicle_id');
    }
}
