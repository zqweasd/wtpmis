<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class VendorHelperModel extends Model
{
	
    protected $table = 'tbl_vendor_helper';
	
    protected $primaryKey = 'vendor_helper_id';



    public $incrementing = false;
}
