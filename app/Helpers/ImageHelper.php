<?php
namespace App\Helpers;

use App\Models\User;
use App\Helpers\GravatarHelper;

class ImageHelper
{
    public static function getUserImage($id){
        $user = User::find($id);
        $avatar_url = "";
        if(!is_null($user))
        {
            if($user->avatar == NULL){
                // Return him Gravatar Image
                if(GravatarHelper::validate_gravater($user->email)){
                    $avatar_url = GravatarHelper::gravatar_image($user->email, 100);
                }else{
                    $avatar_url = url('public/images/defaults/1.png');
                }
            }else{
                 // Return that image
                 $avatar_url = url('public/images/users/' . $user->avatar);
            }
        }else{
             //return redirect ('/');
        }
        return $avatar_url;
    }
}