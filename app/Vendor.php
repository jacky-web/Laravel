<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{


	protected $table= 'vendor';
	 protected $fillable = [
        'company_name', 'contact_email', 'name','mail_qr',
    ];
    
}
 
   