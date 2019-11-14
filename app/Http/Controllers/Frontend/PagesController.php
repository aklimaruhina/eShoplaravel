<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class PagesController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(4);
        return view('frontend.pages.index', compact('products'));        
    	// return view('frontend.pages.index');
    }
    public function login(){
    	return view('frontend.pages.login');
    }
    public function register(){
    	return view('frontend.pages.register');
    }
    
}
