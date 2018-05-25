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

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\VendorsModel;
use App\Models\VendorFamilyModel;
use App\Models\VendorFamilyChildModel;
use App\Models\VendorHelperModel;
use Illuminate\Support\Facades\DB;


class VendorsController extends Controller
{
	public function view(){
		$view				= view('vendors-view');
		return $view;
	}

	public function addvendor(){

		$market 			= trim(Request::input('market'));
		$section 			= trim(Request::input('section'));
		$stallno 			= trim(Request::input('stallno'));
		$fname				= trim(Request::input('firstname'));
		$mname				= trim(Request::input('middlename'));
		$lastname			= trim(Request::input('lastname'));
		$exname				= trim(Request::input('nameextension'));
		$vendor_birthday	= trim(Request::input('vendorbirthday'));
		$vendor_placeofbirth= trim(Request::input('placeofbirth'));
		$permanentaddress	= trim(Request::input('permanentaddress'));
		$cityaddress		= trim(Request::input('cityaddress'));
		$sex				= trim(Request::input('sex'));
		$telephone			= trim(Request::input('telephone'));
		$cellular			= trim(Request::input('cellular')); #no attribute yet
		$others			    = trim(Request::input('others'));		#no attribute yet
		$civilstatus		= trim(Request::input('status'));
		$citizenship		= trim(Request::input('citizenship'));


		$vendor_birthday	 							    = strtotime($vendor_birthday);
		$vendor_birthday			                    	= date("Y-m-d", $vendor_birthday);


		// if(empty($market)){
		// 	$response 		= ['status' => 'failed', 'target' => '#save-user-prompt', 'message' => 'Error! Username is empty.'];
		// 					return response()->json($response);
		// }	
		$mytime 											= Carbon\Carbon::now()->format('mdYHis');
		$pool 												= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$rdmLetter 											= substr(str_shuffle(str_repeat($pool, 5)), 0, 10);
		
		$vendor_id 											= $mytime . '' . $rdmLetter;


		$data				 								= new VendorsModel;
		$data->vendor_id   									= $vendor_id;
		$data->vendor_market 								= $market;
		$data->vendor_section								= $section;
		$data->vendor_stall	 								= $stallno;
		$data->vendor_fname	 								= $fname;
		$data->vendor_mname	 								= $mname;
		$data->vendor_lname	 								= $lastname;
		$data->vendor_nextension							= $exname;
		$data->vendor_birthday								= $vendor_birthday;
		$data->vendor_placeofbirth							= $vendor_placeofbirth;
		$data->vendor_permanentaddress						= $permanentaddress;
		$data->vendor_cityaddress							= $cityaddress;
		$data->vendor_contact_number						= $telephone;
		$data->vendor_civil_status							= $civilstatus;
		$data->vendor_citizenship							= $citizenship;

		$data->save();

		$view = view('vendors.id');
		$view->vendor_id = $vendor_id;
		return $view;

		$response 			= ['status' => 'success' , 'action' => 'redirect' , 'redirect_url' => '/vendors' , 'target' => '#save-user-prompt', 'message' => 'Successfully Added!'];
							return response()->json($response);





	}

	public function addvendorfamily(){
		$vendor_id			= trim(Request::input('vendor_id'));
		$spouse_surname		= trim(Request::input('spousesurname'));
		$spouse_firstname	= trim(Request::input('spousefirstname'));
		$spouse_middlename	= trim(Request::input('spousemiddlename'));

		$father_surname		= trim(Request::input('fathersurname'));
		$father_firstname	= trim(Request::input('fatherfirstname'));
		$father_middlename	= trim(Request::input('fathermiddlename'));

		$mother_maidename	= trim(Request::input('mothermaidename'));
		$mother_surname		= trim(Request::input('mothersurname'));
		$mother_firstname	= trim(Request::input('motherfirstname'));
		$mother_middlename	= trim(Request::input('mothermiddlename'));

		// $vendor_child_name											= trim(Request::input('nameofchild'));
		// $vendor_child_birthday										= trim(Request::input('childdateofbirth'));
		// $vendor_child_birthday	 							    	= strtotime($vendor_child_birthday);
		// $vendor_child_birthday			                    		= date("Y-m-d", $vendor_child_birthday);


		$mytime 													= Carbon\Carbon::now()->format('mdYHis');
		$pool 														= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$rdmLetter 													= substr(str_shuffle(str_repeat($pool, 5)), 0, 10);
		$vendor_family_id											= $mytime . '' . $rdmLetter;


	
		
		$data				 								= new VendorFamilyModel;
		$data->vendor_id									= $vendor_id;
		$data->vendor_family_id								= $vendor_family_id;

		$data->vendor_spouse_lname							= $spouse_surname;
		$data->vendor_spouse_fname							= $spouse_firstname;
		$data->vendor_spouse_mname							= $spouse_middlename;

		$data->vendor_father_lname							= $father_surname;
		$data->vendor_father_fname							= $father_firstname;
		$data->vendor_father_mname							= $father_middlename;

		$data->vendor_mother_maidename						= $mother_maidename;
		$data->vendor_mother_lname							= $mother_surname;
		$data->vendor_mother_fname							= $mother_firstname;
		$data->vendor_mother_mname							= $mother_middlename;





		// $datachild				 											= new VendorFamilyChildModel;
		// $datachild->vendor_child_id 										= $vendor_child_id;
		// $datachild->vendor_child_name										= $vendor_child_name;
		// $datachild->vendor_child_birthday									= $vendor_child_birthday;


		$data->save();
		// $datachild->save();



		$response 			= ['status' => 'success' , 'action' => 'redirect' , 'redirect_url' => '/vendors' , 'target' => '#save-user-prompt', 'message' => 'Successfully Added!'];
							return response()->json($response);


	}

	public function addchild(){


		$vendor_id             		                = trim(Request::input('vendor_id'));
		$child_name 								= trim(Request::input('nameofchild'));
		$child_birth                                = trim(Request::input('childbirthday'));



		$mytime 									= Carbon\Carbon::now()->format('mdYHis');
		$pool 										= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$rdmLetter 									= substr(str_shuffle(str_repeat($pool, 5)), 0, 10);
		$vendor_child_id  							= $mytime . '' . $rdmLetter;
		$child_birth	 							    = strtotime($child_birth);
		$child_birth			                    	= date("Y-m-d", $child_birth);
		

		$data  										= new VendorFamilyChildModel();
		$data->vendor_id                           	= $vendor_id;
		$data->vendor_child_id 						= $vendor_child_id; 
		$data->vendor_child_name                    = $child_name;
		$data->vendor_child_birthday                = $child_birth;



		$data->save();

		// $data  										= VendorFamilyModel::where('vendor_id', '=', $vendor_id)
		// 												->get();

		
		$datachild			                        = VendorFamilyChildModel::where('vendor_id', '=', $vendor_id)
														->get();
		$view 										= view('vendors.childbirthday');
		$view->vendor_id 							= $vendor_id;
		
		$view->datachild                            = $datachild;
		return $view;



	}

	public function addhelper(){


		$vendor_id             		                = trim(Request::input('vendor_id'));
		$helper_sname 								= trim(Request::input('helper_surname'));
		$helper_fname                               = trim(Request::input('helper_firstname'));
		$helper_mname                               = trim(Request::input('helper_middlename'));


		$mytime 									= Carbon\Carbon::now()->format('mdYHis');
		$pool 										= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$rdmLetter 									= substr(str_shuffle(str_repeat($pool, 5)), 0, 10);
		$vendor_helper_id							= $mytime . '' . $rdmLetter;
		

		$data  										= new VendorHelperModel();
		$data->vendor_id                           	= $vendor_id;
		$data->vendor_helper_id 					= $vendor_helper_id;
		$data->vendor_helper_surname                = $helper_sname;
		$data->vendor_helper_firstname              = $helper_fname;
		$data->vendor_helper_middlename             = $helper_mname;


		$data->save();

		// $data  										= VendorFamilyModel::where('vendor_id', '=', $vendor_id)
		// 												->get();

		
		$data			                        	= VendorHelperModel::where('vendor_id', '=', $vendor_id)
														->get();
		$view 										= view('vendors.vendorhelper');
		$view->vendor_id 							= $vendor_id;
		
		$view->data                          		= $data;
		return $view;



	}


	// public function activateCode()
	// {	
	// 	date_default_timezone_set('Singapore');
	// 	$nowdate						= date('Y-m-d', time());
	// 	$code							= trim(Request::input('code'));
		
	// 	$data							= CodeModel::where('code_name','=',$code)
	// 									->where('code_expire_date','=',$nowdate)
	// 									->where('is_active','=',true)
	// 									->first();
																
	// 	if(count($data)>0){	
	// 		$scholar					= ScholarModel::
	// 									leftJoin('tbl_college','tbl_scholar.col_id','=','tbl_college.col_id')
	// 									->where('scholar_id','=',$data->code_scholar_id)
	// 									->first();
			
	// 		//$data->is_active			= false;
	// 		//$data->save();
			
	// 		$view 						= view('scholar.code.view-grade');
	// 		$view->scholar				= $scholar;
	// 		return $view;
			
	// 	}else{
	// 		$message					= 'Invalid Code!';
	// 		$view 						= view('scholar.code.error-code');
	// 		$view->message				= $message;
	// 		return $view;
	// 		/*
	// 		$response 					= ['status' => 'failed', 'target' => '#code-prompt', 'message' => 'Invalid Code!'];
	// 		return [$view,response()->json($response)];*/
	// 	}
		
	// }
}