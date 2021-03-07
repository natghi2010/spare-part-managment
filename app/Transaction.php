<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\PartType;
use App\Part;
use App\Suppliers;
use App\Customers;
use App\Vehicle;


class Transaction extends Model
{

    protected $table = 'transactions';

    protected $fillable = [
        'new_balance',
        'transaction_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function part_type(){
        return $this->belongsTo(PartType::class,'part_type_Id');
    }
    public function part(){
        return $this->belongsTo(Part::class,'part_id');
    }
    public function vehicle(){
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }
}
