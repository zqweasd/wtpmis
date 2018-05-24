<?php namespace App\Libraries;

class Path
{
	static public function avatar($user)
	{
		if (empty($user->avatar)) {
		
			$path = '/img/default-avatar.png';
			return $path;
			
		} else {
			
			$path = '/uploads/'.$user->id.'/'.$user->avatar;
			return $path;
			
		}
		
	}
	
	static public function cover($user)
	{
		if (empty($user->cover)) {
		
			$path = '/img/default-cover.png';
			return $path;
			
		} else {
			
			$path = '/uploads/'.$user->id.'/'.$user->cover;
			return $path;
			
		}
	}
	
	static public function itemPhoto($item_photo)
	{
		$user_id = $item_photo->item->user_id;
		
		if (empty($item_photo)) {
		
			$path = '/img/empty-photo.png';
			return $path;
			
		} else {
			
			$path = '/uploads/'.$user_id.'/items/'.$item_photo->name;
			return $path;
			
		}
		
	}
	
	static public function blogCover($blog)
	{
		if (empty($blog->cover)) {
		
			$path = '/img/default-cover.png';
			return $path;
			
		} else {
			
			$path = '/uploads/'.$blog->user_id.'/blogs/'.$blog->cover;
			return $path;
			
		}
	}
}