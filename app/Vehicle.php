<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Part;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{

    use Notifiable;
    use SoftDeletes;

    protected $guarded = [];
    public function parts(){
        return $this->hasMany(Part::class,'vehicle_id');
    }
}
