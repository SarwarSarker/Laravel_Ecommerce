<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

use App\Models\Division;
use App\Models\District;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashbroad()
    {
        $user = Auth::user();
        return view('frontend.pages.users.dashbroad',compact('user'));
    }
    public function profile()
    {
        $division=Division::orderby('id','asc')->get();
        $district=District::orderby('id','desc')->get();
        $user = Auth::user();
        return view('frontend.pages.users.profile',compact('user','division','district'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
       
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:15',
            'username' => 'required|alpha_dash|username|max:100|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'phone_no' => 'required|max:14|unique:users,phone_no,'.$user->id,
            'street_address' => 'required|max:100',
        ]);

        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->phone_no = $request->phone_no;
        $user->street_address = $request->street_address;
        $user->ip_address = request()->ip();
        $user->shipping_address = $request->shipping_address;
        if($request->password != NULL || $request->password != "")
         {
            $user->password = Hash::make($request->password);
         }
        $user->save();

        $notification = array(
            'message' => ' User Profile has Updated Successfully', 
            'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);
        // session()->flash('success','User Profile has Updated Successfully');
        // return back();

    }

    
}
