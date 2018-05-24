<?php

namespace App\Http\Controllers;

use Request;
use Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
    	$data				= UserModel::all();
    	$view				= view('user-view');
    	$view->data			= $data;
    	return $view;
    }
    public function save(){	
	
		$username 			= trim(Request::input('username'));
		if(empty($username)){
			$response 		= ['status' => 'failed', 'target' => '#save-user-prompt', 'message' => 'Error! Username is empty.'];
							return response()->json($response);
		}	
		
		if(!preg_match("/^[a-zA-Z0-9-]*$/",$username)) {
			$response 		= ['status' => 'failed', 'target' => '#save-user-prompt', 'message' => 'Error! Only Letters and numbers are allowed.'];
							return response()->json($response);
		}
		
		$user 				= UserModel::where('username','=',$username)->first();
		
		if( count($user) > 0){
			$response 		= ['status' => 'failed', 'target' => '#save-user-prompt', 'message' => 'Error! Username already exist.'];
							return response()->json($response);
		}
		
		$data				= new UserModel;
		$data->username		= $username;
		$data->fname		= 'empty';
		$data->mname		= 'empty';
		$data->lname		= 'empty';
		$data->password		= Hash::make('password');
		$data->create_user  = '1';
		$data->is_superadmin  = '0';
		$data->is_admin		= false;
		$data->is_active	= true;
		$data->save();
		
		$response 			= ['status' => 'success' , 'action' => 'redirect' , 'redirect_url' => '/admin/view-users' , 'target' => '#save-user-prompt', 'message' => 'Successfully Added!'];
							return response()->json($response);
	}
	public function inactive(){
		
		$data_id	 		= trim(Request::input('data_id'));
		$data	 			= trim(Request::input('data'));
		
		$update				= UserModel::where('id', $data_id)
							->update(['is_active'=>$data]);
	}
}
