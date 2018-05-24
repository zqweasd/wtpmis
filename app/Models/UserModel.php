<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class UserModel extends Model
{
    protected $table = 'users';
	
    protected $fillable = ['name', 'email', 'password'];
	
	protected $hidden = ['password', 'remember_token'];
    
    public function events()
	{
		return $this->hasMany('App\Models\EventModel','user_id');
	}
}
