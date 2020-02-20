<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDec extends Model
{
     protected $table= 'healthdec';
	 protected $fillable = [
        'vendor_id' ,'NRIC_NO','contact_no', 'has_mainland_china','has_conformed_patient','illness','current_temp',
    ];
}
