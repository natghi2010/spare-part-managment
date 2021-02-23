<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartType extends Model
{
    protected $table = "part_type";

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
