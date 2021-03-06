<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehicle;
use App\PartType;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part extends Model
{

    use SoftDeletes;
    protected $guarded = [];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }

    public function part_type(){
        return $this->belongsTo(PartType::class,'part_type_id');
    }

}
