<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Parts;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{

    use Notifiable;
    use SoftDeletes;

    protected $guarded = [];
    public function parts(){
        return $this->hasMany(Parts::class,'vehicle_id');
    }
}
