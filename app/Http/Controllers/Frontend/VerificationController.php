<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class VerificationController extends Controller
{
    public function verify($token){
    	$user = User::where('remeber_token', $token)->first();
    	if(!is_null($user)){
    		$user->status = 1;
    		$user->remeber_token = NULL;
    		$user->save();
    		session()->flash('success', 'You are registered successfully. Login Now');
    		return redirect('login');
    	}else{
    		session()->flash('error', 'Your Token is not matched');
    		return redirect('/');
    	}
    }
}
