<?php 

namespace App\Http\Controllers;

use Request;
use Hash;
use Casche;
use Response;
use Session;
use View;
use Carbon;
use URL;

use App\Models\UserModel;

use Illuminate\Support\Facades\DB;;
use SoapClient;

class HomeController extends Controller {

	
	public function index()
	{			
		
		$view 										= view('index');
		return $view;
	}
	
	public function admin()
	{	
		$view 			= view('layouts.default-layout');
		return $view;
	}
	
    public function authenticate()
    {
        $account 		= trim(Request::input('account'));
		$password 		= trim(Request::input('password'));
		$remember_me 	= trim(Request::input('remember_me'));
		//$status			= NotificationModel::first();
		
		$redirect_url   = '';
		
		if ( empty($account) || empty($password) ) {
			$response = ['status' => 'failed',  'target' => '#login-prompt', 'message' => 'Error! Please enter your Username and Password...'];
			return response()->json($response);
		}
		
		$user = UserModel::where('username','=',$account)->first();
		
		if (!$user) {
			$response = ['status' => 'failed',  'target' => '#login-prompt', 'message' => 'Error! Username and/or Password does not exist'];
			return response()->json($response);
		}
		
		if ($user->is_active == 0) {
			$response = ['status' => 'failed',  'target' => '#login-prompt', 'message' => 'Error! Account is NOT Available Anymore!'];
			return response()->json($response);
		}
		
		$hashed_password = $user->password;
		
		if (!Hash::check($password, $hashed_password)) {
			$response = ['status' => 'failed',  'target' => '#login-prompt', 'message' => 'Error! Incorrect username and/or password...'];
			return response()->json($response);
		}
		
		$default_pass = 'password';
		if(!Hash::check($default_pass, $hashed_password)){
			Session::put('default_pass',$default_pass);
		}
		
		$default_pass = 'password';
		if(!Hash::check($default_pass, $hashed_password)){
			Session::put('default_pass',$default_pass);
		}
		
		$account_type = ($user->is_admin) ? 'Administrator' : 'User';
		
		Session::put('user_id', $user->id);
		Session::put('username', $user->username);
		Session::put('is_admin', $user->is_admin);
		Session::put('is_superadmin', $user->is_superadmin);
		Session::put('lname', $user->lname);
		Session::put('fname', $user->fname);
		Session::put('mname', $user->mname);
		
			// --- SUPER ADMIN SMS
		 	/* if($status->notification_admin_on==true){
				
				$wsdl   		= "http://services.cagayandeoro.gov.ph/smswebservice/smsws.asmx?wsdl";
				$client 		= new SoapClient($wsdl, array('trace'=>1));
			
				$request_param 	= array(
					"thisValidationCode"=> 'SCHOLAR',
					"thisRecipient" 	=> $status->notification_number,
					"thisMessage" 		=> "CP: ".$account." [LOGIN] \r- DO NOT REPLY",
					//"thisMessage" 		=> "City Scholarship: Your application form has been received and a subject for evaluation. \r- You cannot edit/update your application form. \r- Wait for further notice. \r- DO NOT REPLY",
				);
					
				try{
					$responce_param = $client->saveSMS($request_param);
				}catch (Exception $e){ 
					echo "<h2>Exception Error!</h2>"; 
					echo $e->getMessage(); 
				}
			}  */
			// END SUPER ADMIN SMS
			
		if (!empty($remember_me)) {
			$response = ['status' => 'success', 'action' => 'redirect', 'redirect_url' => '/'.$redirect_url ,'message' => 'Authenticated!'];
			return response()->json($response)->withCookie(cookie()->forever('account', $account))->withCookie(cookie()->forever('password', $password));	
		} else {
			$response = ['status' => 'success',  'target' => '#login-prompt', 'action' => 'redirect', 'redirect_url' => '/'.$redirect_url,'message' => 'Authenticated!'];
			return response()->json($response);
		}
    
    
    }
    
    public function logout()
	{
		Session::flush();
		return redirect('/');
	}
}
