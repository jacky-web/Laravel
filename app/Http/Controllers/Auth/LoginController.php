<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use auth;
use App\User;
use DB;
use Mail;

use Illuminate\Support\Str;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
     public function index()
        {
             return view('vendor_login.step1');
        }

        public function indextwo()
        {

             return view('vendor_login.step2');
        }

        public function vendor_dashbord($vendor_id)
        {

             $users = DB::table('healthdec')->where('vendor_id', $vendor_id)->paginate(2);

             $vendor = DB::table('vendor')->where('id', $vendor_id)->get();
             return view('home')->with('users',$users)->with('vendor',$vendor);
                
        }

        public function login(Request $request)
        {            
            $this->validate($request,[


                'email' => 'required|email',
        ]);  

          $email = $request->get('email');
    
        // $data = new User;
           $id = DB::table('users')->where('email', $email)->value('id');
        // $data->contact_email=$request->input('contact_email');
       $users = DB::table('users')->where('email', $email)->value('email');
       
        if (count($users) > 0) {
                                           
                    Mail::send('mail',['name' => 'jacky'],function($message) use ($email) {
                     $otp = Str::random(4);
                   $id = DB::table('users')->where('email', $email)->value('id');
                    $message->to($email)->subject($otp);
                    $message->from('jackysolanki70@gmail.com','jay solanki');
                    $data=array('otp'=>$otp);
                     DB::table('users')->where('id', $id)->update($data);
                    });

                    $email = DB::table('users')->where('email', $email)->value('email');
                     $data =  DB::table('users')->where('id', $id)->get();
                   

                   return view('vendor_login.step2')->with('data' , $data);
                    //return redirect()->route('vendor.login.step2')->with('data' , $data);

                     // return redirect()->action('App\Http\Controllers\Auth\LoginController@indextwo',['data' => $data]);

        }
            else{

                return response()->json("something wrong while generate otp");
            }
        }

        public function loginbyotp(request $request){


            $email = $request->get('email');

             $otp =$request->get('otp');

             $vendor_id =$request->get('vendor_id');

             $userdata = array(
                    
                'email'  => $email,
                'otp' => $otp,
             );

            // $data = DB::table('users')->where($userdata)->get();

            $data = DB::table('users')->where([
                                    'email' => $email,
                                     'otp' => $otp   
                                        ])->get();

           
                      
           if (count($data) > 0) {

                 $update=array('otp'=>null);

                    DB::table('users')->where('email', $email)->update($update);

                $vendor_id = DB::table('healthdec')->where('vendor_id',$vendor_id)->value('vendor_id');                     
                    return redirect()->route('vendor.dashbord',$vendor_id);          
           
                   // return view('home')->with('users',$users);
                        
           }

           else{

                //return redirect()->route('vendor.login.step2');

            echo "wronge";
           }
             // if( DB::table('users')->where([
             //                        ['email', '=' , $email],
             //                         ['otp', '=' , $otp]   
             //                            ]))

            }

        

    use AuthenticatesUsers;
   

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
