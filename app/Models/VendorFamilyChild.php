<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class VendorFamilyChildModel extends Model
{
	
    protected $table = 'tbl_vendor_child';
	
    protected $primaryKey = 'vendor_child_id';



    public $incrementing = false;
}
