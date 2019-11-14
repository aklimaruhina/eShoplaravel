<?php 
namespace App\Helpers;

/**
*Gravatar helper
*/
class GravatarHelper{
	public static function validate_gravatar($email){
		$hash = md5($email);
		$uri = 'https://www.gravatar.com/avatar/'.$hash.'?d=80';
		$headers = @get_headers($uri);
		if(!preg_match('|200|', $headers[0])){
			$has_valid_avatar = false;
		}else{
			$has_valid_avatar = true;
		}
		return $has_valid_avatar;

	}
	public static function gravatar_image($email, $size = 0, $d=""){
		$hash = md5($email);
		$image_uri = 'https://www.gravatar.com/avatar/'.$hash.'?s='.$size.'&d='.$d;
		return $image_uri;
	}
}
 ?>