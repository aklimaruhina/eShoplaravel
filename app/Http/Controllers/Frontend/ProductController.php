<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('frontend.pages.products.products')->with('products', $products);
    }
    public function show($slug){
        $product = Product::where('slug', $slug)->first();
        if(!is_null($product)){
            return view('frontend.pages.products.show', compact('product'));
        }else{
            return redirect()->route('products')->with('error','Not found page!');
        }

    }
}
