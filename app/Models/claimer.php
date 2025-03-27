<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class claimer extends Model
{
    protected $fillable = [
        'item_id','fullname','phone','email','status'
    ];
}
