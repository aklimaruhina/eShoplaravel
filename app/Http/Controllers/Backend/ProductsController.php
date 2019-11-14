<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Image;
use App\ProductImage;
use App\Category;
use App\Brand;
use File;
class ProductsController extends Controller
{
    public function createproduct(){
    	return view('backend.pages.product.createproduct');
    }
    public function edit_product($id){
        $product = Product::find($id);
        // return view('backend.pages.product.manage')->with('products', $products);
        return view('backend.pages.product.editproduct')->with('product', $product);   
    }
    public function store_product(Request $request){
        
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1200',
            'quantity' => 'required',
            'price' => 'required',
            'category_id' => 'required|numeric',
            'product_image' => 'required'
            ]);
    	$products = new Product;
    	$products->title = $request->title;
    	$products->description = $request->description;
    	$products->slug = str_slug($request->title);
    	$products->quantity = $request->quantity;
    	$products->price = $request->price;
    	$products->offer_price = $request->offer_price;
    	$products->status = $request->status;
    	$products->admin_id = $request->admin_id;
    	$products->category_id = $request->category_id;
    	$products->brand_id = $request->brand_id;
    	$products->save();
        
        // Generate multiple image thumbnail 
        if(count($request->product_image) > 0){
            foreach ($request->product_image as $image) {
        
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('image/product-image/');
            // Image::make($image)->save($location);
            $image->move($location,$img);
            $product_images = new ProductImage;
            $product_images->product_id = $products->id;
            $product_images->image = $img;
            $product_images->save();
          
            }
        }

        //Generate single image2wbmp(image)  thumbnail 

        // if($request->hasFile('product_image')){
        //     $image = $request->file('product_image');
        //     $img = time().'.'.$image->getClientOriginalExtension();
        //     $location = public_path('image/product-image/'.$img);
        //     // Image::make($image)->save($location);
        //     $image->move($location,$image->getClientOriginalName());
        //     $product_images = new ProductImage;
        //     $product_images->product_id = $products->id;
        //     $product_images->image = $img;
        //     $product_images->save();
        // }
    	return redirect()->route('createproduct');
    }

    public function update_product(Request $request, $id){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1200',
            'quantity' => 'required',
            'price' => 'required'
            // 'product_image' => 'required'
            ]);
        $products = Product::find($id);
        $products->title = $request->title;
        $products->description = $request->description;
        $products->slug = str_slug($request->title);
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->offer_price = $request->offer_price;
        $products->status = $request->status;
        $products->admin_id = $request->admin_id;
        // $products->category_id = 1;
        // $products->brand_id = 1;
        $products->save();
        
        return redirect()->route('manageproduct');
    }

    public function manage_product(){
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.product.manage')->with('products', $products);
    }
    public function delete_product($id){
        $product = Product::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        return back();
    }

    
}
