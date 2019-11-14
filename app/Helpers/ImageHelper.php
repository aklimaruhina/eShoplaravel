<?php 
namespace App\Helpers;
use App\User;
use App\Helpers\GravatarHelper;

class ImageHelper{
	public static function getUserImage($id){
		$user = User::find($id);
		$avatar_url = "";

		if(!is_null($user)){
			if($user->avatar == null){
				if(GravatarHelper::validate_gravatar($user->email)){
					$avatar_url = GravatarHelper::gravatar_image($user->email, 35);
				}else{
					$avatar_url = url('image/users/gravater.jpg');
				}
			}else{
				$avatar_url = url('image/users/'.$user->avatar);
			}
		}else{
			// return redirect('/');
		}
		return $avatar_url;
	} 
}
 ?>
