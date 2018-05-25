<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class VendorsModel extends Model
{
	
    protected $table = 'tbl_vendors';
	
    protected $primaryKey = 'vendor_id';



    public $incrementing = false;
}
