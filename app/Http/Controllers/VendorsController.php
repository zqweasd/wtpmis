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


class VendorsController extends Controller
{
	public function view(){
		$view				= view('vendors-view');
		return $view;
	}
}