<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Product;
use App\ProductImage;
use Image;
use File;
use DataTables;

class CategoriesController extends Controller
{
    
    // Manage Category Controller 

    
    
    public function manage_category(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.categories.managecat')->with('categories', $categories);
    }
    public function create_category(){
        $primary_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get(); 
        return view('backend.pages.categories.createcategory', compact('primary_categories'));
    }
    public function store_category(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:1200',
            'category_image' => 'nullable|image'
            ],
            [
            'name.required' => 'Please provide a category name',
            'desc.required' => 'Please Provide description of category',
            'category_image.image'=> 'Please provide valid image'
            ]
            );
        
        //Generate single image2wbmp(image)  thumbnail 
        $categories = new Category;
        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->parent_id = $request->parent_id;

        if($request->category_image){
            $image = $request->file('category_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('image/category-image/'.$img);
            Image::make($image)->save($location);
            // $image->move($location,$img);
            $categories->image = $img;
            
        }
        
        $categories->save();
        session()->flash('success', 'A new category has been created');
        return redirect()->route('managecategory');

    }
    public function edit_category($id){
        $primary_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get(); 
        $category = Category::find($id);
        if(!is_null($category)){
            return view('backend.pages.categories.editcategory', compact('category', 'primary_categories'));     
        }else{
            return redirect()->route('managecategory');
        }

        // return view('admin.pages.product.manage')->with('products', $products);
        
    }
    public function update_category(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:1200',
            'category_image' => 'nullable|image'
            ],
            [
            'name.required' => 'Please provide a category name',
            'desc.required' => 'Please Provide description of category',
            'category_image.image'=> 'Please provide valid image'
            ]
            );
        
        //Generate single image2wbmp(image)  thumbnail 
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->parent_id = $request->parent_id;

        if($request->category_image){
            $image = $request->file('category_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('image/category-image/');
            // Image::make($image)->save($location);
            $image->move($location,$img);
            $categories->image = $img;
            
        }
        $categories->save();
        session()->flash('success', 'A new category has been Updated');
        return redirect()->route('managecategory');

    }
    public function delete_category($id){
        $category = Category::find($id);
        if(!is_null($category)){
            if($category->parent_id === NULL){
                $sub_categories = Category::orderBy('name', 'asc')->where('parent_id', $category->id)->get();
                foreach ($sub_categories as $sub) {
                    if(File::exists('image/category-image/'.$sub->image )){
                        File::delete('image/category-image/'.$sub->image );
                    }
                    $sub->delete();
                }
            }
            if(File::exists('image/category-image/'.$category->image )){
                File::delete('image/category-image/'.$category->image );
            }
            $category->delete();
        }
        session()->flash('success', 'A new category has been deleted');
        return back();
    }
}
