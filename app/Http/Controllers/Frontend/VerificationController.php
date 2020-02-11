<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();
        
        if(!is_null($user)){
            $user->status = 1;
            $user->remember_token = NULL;
            $user->save();
            $notification = array(
                'message' => ' You are successfully !! Login now......', 
                'alert-type' => 'success'
              );
              return Redirect('login')->with($notification);
        }else{
            $notification = array(
                'message' => ' Your token is not match!!!!', 
                'alert-type' => 'error'
              );
              return Redirect('/')->with($notification); 
        }
    }
        
}
