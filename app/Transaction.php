<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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


    public function getHumanDateAttribute()
    {
        return  Carbon::parse($this->date)->format('D d m Y');
    }

    public function getDurationAttribute(){
        return Carbon::parse($this->date)->diffForHumans(Carbon::now());
    }

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
    public function supplier(){
        return $this->belongsTo(Suppliers::class,'supplier_id');
    }
    public function customer(){
        return $this->belongsTo(Customers::class,'customer_id');
    }
}
