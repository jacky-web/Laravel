<?php

namespace App\Http\Controllers;
use App\Vendor;
use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class VendorController extends Controller
{
    
    public function create(Request $req){

    	    $this->validate($req,[

            'company_name' => 'required',
            'contact_email' => 'required|unique:vendor',
            'name' => 'required',
            'mail_qr' => 'required',
        	]); 

       		 $vendor = new Vendor;
       		 $vendor->company_name=$req->input('company_name');
       		 $company_name=$vendor->company_name=$req->input('company_name');
		     $contact_email = $vendor->contact_email=$req->input('contact_email');
		     $vendor->contact_email=$req->input('contact_email');
		     $name=$vendor->name=$req->input('name');
		     $vendor->name=$req->input('name');
		     $vendor->mail_qr=$req->input('mail_qr');
		     $mail_qr= $req->input('mail_qr');

		     $vendor->save();

		    $vendor_id=$vendor->id;

		    $Vendor_reg=array("vendor_id"=>$vendor_id,"email"=>$contact_email);
		    
		    //$data =array('name' => 'jacky')

		      Mail::send('mail',['name' => 'jacky'],function($message) use ($Vendor_reg) {
		     		$message->to($Vendor_reg['email'])->subject('registration for vendor successfully ');
		     		$message->from('jackysolanki70@gmail.com','jay solanki');

		     		echo "mail sent";
		     });

		     Mail::send('mail',['name' => 'jacky'],function($message) use ($Vendor_reg) {
		     		$message->to($Vendor_reg['email'])->subject('vendor form submited successfully ');
		     		$message->from('jackysolanki70@gmail.com','jay solanki');
		     		echo "mail sent";
		     });
		     DB::table('users')->insert($Vendor_reg);		     
		     
			    if ($vendor) {
			            	
			    	return response()->json("form sumited and vendor registration success");
			   }
    }
}
