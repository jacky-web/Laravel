<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthDeclarition extends Model
{
    protected $table= 'healthdesc';
	 protected $fillable = [
        'NRIC_NO', 'contact_no', 'has_mainland_china','has_conformed_patient','illness','current_temp',
    ];
}
