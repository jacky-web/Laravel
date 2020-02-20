<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor_reg extends Model
{
     protected $fillable = [
        'vendor_id', 'email', 'otp',
    ];
}
