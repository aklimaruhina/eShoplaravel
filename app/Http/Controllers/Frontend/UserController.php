<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Division;
use App\District;
use Auth;
use Hash;

class UserController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    public function dashboard(){
    	$user = Auth::user();
    	return view('frontend.pages.users.dashboard', compact('user'));
    }
    public function profile(){
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
    	$user = Auth::user();
    	return view('frontend.pages.users.profile', compact('user', 'divisions', 'districts'));
    }
    public function profile_update(Request $request){
        $user = Auth::user();
        $this->validate($request, [
            'first_name' => 'required|string|max:30',
            'last_name' => 'nullable|string|max:20',
            // 'username' => 'required|alpha_dash|max:100|unique:users,username,'.$user->id,
            // 'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'phone' => 'required|max:15|unique:users,phone,'.$user->id,
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'address' => 'required|max:100'
        ]);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->username = $request->username;
        // $user->email = $request->email;
        $user->phone = $request->phone;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->address = $request->address;
        $user->shipping_address = $request->shipping_address;
        if($request->password != NULL || $request->password !=''){
            $user->password = Hash::make($request->password);
        }
        $user->ip_address = $request->ip();
        $user->save();
        session()->flash('success', 'Profile information updated');
        return back();
     }
}
