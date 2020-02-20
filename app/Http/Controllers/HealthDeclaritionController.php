<?php

namespace App\Http\Controllers;
use App\UserDec;
//use App\Enums\user_reg;
//use APP\healthenum;
use Illuminate\Http\Request;
//use BenSampo\Enum\Rules\EnumKey;

class HealthDeclaritionController extends Controller
{
    
     public function create(Request $req){

    	    $this->validate($req,[

            'NRIC_NO' => 'required',
            'contact_no' => 'required|numeric',
            'has_mainland_china' => 'required',
            'has_conformed_patient' => 'required',
             'illness' => 'required',
             'current_temp' => 'required',
        	]); 

     	 // $this->validate($req,[

       //      'NRIC_NO' => 'required',
       //      'contact_no' => 'required|numeric',
       //      'has_mainland_china' => ['required', new EnumKey(user_reg::class)],
       //      'has_conformed_patient' => ['required', new EnumKey(user_reg::class)],
       //       'illness' => ['required', new EnumKey(user_reg::class)],
       //       'current_temp' => 'required',
       //  	]); 
        	$user = new UserDec;
        	$user->vendor_id=$req->input('vendor_id');
       		 $user->NRIC_NO=$req->input('NRIC_NO');
		     $user->contact_no=$req->input('contact_no');
		     $user->has_mainland_china=$req->input('has_mainland_china');
		     $user->has_conformed_patient=$req->input('has_conformed_patient');
		      $user->illness=$req->input('illness');
		       $user->current_temp=$req->input('current_temp');


		       $user->save();

		       


     	//return user_reg::no;

     }
}


