<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ammendment_tracker extends Model
{
    //
    protected $table = 'ammendment_trackers';

    protected $fillable = [
        'transaction_id',
        'user_id'
    ];
    public function transaction(){
        return $this->belongsTo(Transaction::class,'transaction_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
