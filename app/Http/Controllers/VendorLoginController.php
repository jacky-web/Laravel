<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class VendorLoginController extends Controller
{
    
		public function index()
		{
			 return view('vendor_login.step1');
		}

		public function index2()
		{
			 return view('vendor_login.step2');
		}

		public function login(Request $request)
		{

			$this->validate($request,[


    			'contact_email' => 'required|email',
    	]);

				$userdata = array(
					
		        'contact_email'  => $request->input('email')
		   	 );

		if (Auth::attempt($userdata)) {

   					return redirect(route('vendor.login.step2'));
			}

			else{

				echo "something wrong";
			}
	

		}


}
