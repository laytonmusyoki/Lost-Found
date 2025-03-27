<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostFound extends Model
{
    protected $fillable = [
        'item_name','descrption','image','status'
    ];
}
