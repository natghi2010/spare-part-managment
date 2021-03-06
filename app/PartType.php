<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartType extends Model
{
    use SoftDeletes;
    protected $table = "part_type";

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
