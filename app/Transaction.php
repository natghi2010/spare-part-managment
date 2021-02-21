<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\PartType;
use App\Parts;
use App\Suppliers;
use App\Customers;
use App\Vehicle;


class Transaction extends Model
{

    protected $fillable = [
        'new_balance',
        'transaction_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function part_type(){
        return $this->belongsTo(PartType::class,'user_id');
    }
    public function part(){
        return $this->belongsTo(Parts::class,'user_id');
    }
}
