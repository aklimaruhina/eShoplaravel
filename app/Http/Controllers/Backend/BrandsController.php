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
class BrandsController extends Controller
{
    

    // Manage Brand controller 
    public function manage_brand(){
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.pages.brands.managebrand')->with('brands', $brands);
    }
    public function create_brand(){

        return view('backend.pages.brands.createbrand');
    }
    public function store_brand(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:1200',
            'brand_image' => 'nullable|image'
            ],
            [
            'name.required' => 'Please provide a category name',
            'desc.required' => 'Please Provide description of category',
            'brand_image.image'=> 'Please provide valid image'
            ]
            );
        
        //Generate single image2wbmp(image)  thumbnail 
        $brands = new Brand;
        $brands->name = $request->name;
        $brands->desc = $request->desc;

        if($request->brand_image){
            $image = $request->file('brand_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('image/brand-image/'.$img);
            Image::make($image)->save($location);
            // $image->move($location,$img);
            $brands->image = $img;
            
        }
        $brands->save();
        session()->flash('success', 'A new Brand has been created');
        return redirect()->route('managebrand');
    }
    public function edit_brand($id){
        $brand = Brand::find($id);
        if(!is_null($brand)){
            return view('backend.pages.brands.editbrand', compact('brand'));     
        }else{
            return redirect()->route('managebrand');
        }
    }
    public function update_brand(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:1200',
            'brand_image' => 'nullable|image'
            ],
            [
            'name.required' => 'Please provide a category name',
            'desc.required' => 'Please Provide description of category',
            'brand_image.image'=> 'Please provide valid image'
            ]
            );
        
        //Generate single image2wbmp(image)  thumbnail 
        $brands = Brand::find($id);
        $brands->name = $request->name;
        $brands->desc = $request->desc;

        if($request->brand_image){
            $image = $request->file('brand_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('image/brand-image/');
            // Image::make($image)->save($location);
            $image->move($location,$img);
            $brands->image = $img;
            
        }
        $brands->save();
        session()->flash('success', 'A new Brand has been created');
        return redirect()->route('managebrand');   
    }
    public function delete_brand($id){
        $brand = Brand::find($id);
        if(!is_null($brand)){
            if(File::exists('image/brand-image/'.$brand->image )){
                File::delete('image/brand-image/'.$brand->image );
            }
            $brand->delete();
        }
        session()->flash('success', 'Brand has been deleted');
        return back();
    }
}
